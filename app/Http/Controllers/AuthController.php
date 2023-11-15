<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    function viewLogin()
    {
        if (session()->has('id_user')) {
            if (session()->has('login.user')) {
                return redirect()->route('user.pengaduan');
            } else {
                return redirect()->route('admin.dashboard');
            }
        } else {
            return view('login');
        }
    }

    function viewRegister()
    {
        if (session()->has('id_user')) {
            if (session()->has('login.user')) {
                return redirect()->route('user.pengaduan');
            } else {
                return redirect()->route('admin.dashboard');
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
            ]);
        } else {
            $usermodel = new User();
            $user = $usermodel->insertData($request->all());
            
            if ($user) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Registrasi Berhasil! Silahkan Tunggu 1x24 Jam Untuk Menunggu Konfirmasi Dari Admin'
                ]);
            }
        }
    }

    function login(Request $request)
    {
        $userModel = new User();
        $user = $userModel->authenticate($request->input('user'), $request->input('password'));

        if ($user) {
            if ($user->status_user === 1) {
                if ($user->role_user === 1) {
                    session(['login.user' => true]);
                } else if ($user->role_user === 0) {
                    session(['login.admin' => true]);
                }

                session(['id_user' => $user->id_user]);
                return response()->json([
                    'status'    => 'success',
                    'message'   => 'Login Berhasil.'
                ]);
            } else {
                return response()->json([
                    'status'    => 'error',
                    'message'   => 'User Belum Aktif.'
                ]);
            }
        } else {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Email / Username Tidak Ditemukan atau Password Salah.'
            ]);
        }
    }

    public function logout()
    {
        session()->forget('login.user');
        session()->forget('login.admin');
        session()->forget('id_user');

        return redirect()->route('login');
    }
}
