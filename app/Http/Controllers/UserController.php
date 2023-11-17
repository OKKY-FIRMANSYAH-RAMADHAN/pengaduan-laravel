<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['user'] = User::where('status_user',1)->whereNotIn('id_user', [session('id_user')])->get();
        $data['judul'] = "Daftar User";
        return view('user', $data);
    }

    public function detail($id)
    {
        $data = User::where('id_user', $id)->get();
        return response()->json($data);
    }

    public function userNonverif()
    {
        $data['user'] = User::where('status_user',0)->get();
        $data['judul'] = "Daftar User Belum Verifikasi";
        return view('usernonverif', $data);
    }

    public function akun()
    {
        $data['judul'] = "Data Akun";
        $data['user'] = User::where('id_user', session('id_user'))->first();
        return view('dataakun', $data);
    }

    public function updateGambar(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'gambarBaru' => 'mimes:png,jpg,jpeg',
        ], [
            'gambarBaru.mimes' => 'Hanya Diijinkan File Berektensi png, jpg, jpeg.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ])->header('Content-Type', 'application/json');
        }else{
            $id = $request->id_user;
            $user = User::find($id);
            $file = $request->file('gambarBaru');
            $randomFileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $foto_default = array('1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg');
            if (!in_array($user['foto_user'], $foto_default)) {
                Storage::delete('public/foto_user/'.$user['foto_user']);
            }

            $file->storeAs('public/foto_user', $randomFileName);
            $user->foto_user = $randomFileName;
            $user->save();

            if ($user) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Gambar Berhasil Diubah'
                ])->header('Content-Type', 'application/json');
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'Gambar Gagal Diubah'
                ])->header('Content-Type', 'application/json');
            }

        }

    }

    public function gantiPassword(Request $request)
    {
        $user = User::find($request->id_user);
        if (password_verify($request->passwordLama, $user->password_user)) {
            if ($request->passwordBaru === $request->passwordKonfirmasi) {
                $user->password_user = Hash::make($request->passwordBaru);
                $user->save();
                $pesan = [
                    'status' => 'success',
                    'message' => 'Berhasil Mengubah Password.'
                ];
            }else{
                $pesan = [
                    'status' => 'error',
                    'message' => 'Konfirmasi Password Tidak Sama !'
                ];
            }
        }else{
            $pesan = [
                'status' => 'error',
                'message' => 'Password Lama Tidak Sesuai.'
            ];
        }

        return response()->json($pesan)->header('Content-Type', 'application/json');
    }

    public function update(Request $request)
    {
        $user = User::find($request->id_user);
        $user->nama_user = $request->nama_user;
        $user->username = $request->username;
        $user->email_user = $request->email_user;
        $user->save();

        if ($user) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data Berhasil Diubah'
            ])->header('Content-Type', 'application/json');
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Data Gagal Diubah'
            ])->header('Content-Type', 'application/json');
        }
    }

    public function verifikasi($id)
    {
        $user = User::find($id);
        $user->status_user = 1;
        $user->save();

        if ($user) {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil Menyetujui User.'
            ])->header('Content-Type', 'application/json');
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal Menyetujui User.'
            ])->header('Content-Type', 'application/json');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $foto_default = array('1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg');
            if (!in_array($user['foto_user'], $foto_default)) {
                Storage::delete('public/foto_user/'.$user['foto_user']);
            }
            Storage::delete('public/identitas/'.$user['identitas_user']);
            User::destroy($id);

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil Menghapus User.'
            ])->header('Content-Type', 'application/json');
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal Menghapus User.'
            ])->header('Content-Type', 'application/json');
        }
    }
}
