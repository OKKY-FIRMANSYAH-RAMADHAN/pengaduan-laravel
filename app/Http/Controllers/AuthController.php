<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    function viewLogin()
    {
        if (session()->has('id_user')) {
            if (session()->has('login.user')) {
                return redirect()->route('pengaduan.user');
            } else {
                return redirect()->route('dashboard');
            }
        } else {
            return view('login');
        }
    }

    function viewRegister()
    {
        if (session()->has('id_user')) {
            if (session()->has('login.user')) {
                return redirect()->route('pengaduan.user');
            } else {
                return redirect()->route('dashboard');
            }
        } else {
            return view('register');
        }
    }

    function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_user' => 'required',
            'username'  => 'required|unique:user,username',
            'email_user' => 'required|email|unique:user,email_user',
            'identitas_user' => 'required|mimes:png,jpg,jpeg|max:5120',
            'password_user' => 'required|min:8|confirmed'
        ], [
            'nama_user.required' => 'Nama User Harus Diisi.',
            'username.required' => 'Username Harus Diisi.',
            'username.unique' => 'Username Sudah Terdaftar.',
            'email_user.required' => 'Email Harus Diisi.',
            'email_user.email' => 'Email Tidak Benar',
            'email_user.unique' => 'Email Sudah Terdaftar.',
            'identitas_user.required' => 'Identitas Harus Diisi.',
            'identitas_user.mimes' => 'Hanya Diijinkan File Berektensi png, jpg, jpeg.',
            'identitas_user.max' => 'Maksimal Ukuran File 5MB.',
            'password_user.required' => 'Password Harus Diisi.',
            'password_user.min' => 'Password minimal harus 8 karakter.',
            'password_user.confirmed' => 'Konfirmasi password tidak cocok.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ])->header('Content-Type', 'application/json');
        } else {
            $user = new User;
            if ($request->file('identitas_user')) {
                $identitas = $request->file('identitas_user');
                $identitasName = Str::random(20) . '.' . $identitas->getClientOriginalExtension();
                $identitas->move(public_path('assets/uploads/identitas'), $identitasName);
                $user->identitas_user = $identitasName;
            }

            $user->nama_user = $request->nama_user;
            $user->username = $request->username;
            $user->email_user = $request->email_user;
            $user->password_user = Hash::make($request->password_user);
            $user->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Registrasi Berhasil! Silahkan Tunggu 1x24 Jam Untuk Menunggu Konfirmasi Dari Admin'
            ])->header('Content-Type', 'application/json');
        }
    }

    function login(Request $request)
    {
        $user = User::where('email_user', $request->user)->orWhere('username', $request->user)->first();
        if ($user) {
            if ($user->role_user === 1) {
                if (password_verify($request->password, $user->password_user)) {
                    if ($user->status_user === 1) {
                        session(['login.user' => true]);
                        session(['id_user' => $user->id_user]);
                        $status = 'success';
                        $pesan = 'Login Berhasil.';
                    } else {
                        $status = 'error';
                        $pesan = 'User Belum Aktif.';
                    }
                } else {

                    $status = 'error';
                    $pesan = 'Password salah.';
                }
            } else if ($user->role_user === 0) {
                if (password_verify($request->password, $user->password_user)) {
                    session(['login.admin' => true]);
                    session(['id_user' => $user->id_user]);
                    $status = 'success';
                    $pesan = 'Login Berhasil.';
                } else {
                    $status = 'error';
                    $pesan = 'Password salah.';
                }
            }
        } else {
            $status = 'error';
            $pesan = 'Email / Username Tidak Ditemukan.';
        }

        return response()->json([
            'status'    => $status,
            'message'   => $pesan
        ])->header('Content-Type', 'application/json');
    }

    public function logout()
    {
        session()->forget('login.user');
        session()->forget('login.admin');
        session()->forget('id_user');

        return redirect()->route('login');
    }
}
