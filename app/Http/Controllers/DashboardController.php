<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengaduan;

class DashboardController extends Controller
{
    function index()
    {
        $data['judul'] = "Dashboard";
        $data['user_nonverif'] = User::where('status_user', 0)->orderByDesc('created_at')->limit(10)->get();
        $data['pengaduan_baru'] = Pengaduan::where('status_pengaduan', 0)->orderByDesc('created_at')->get();
        return view('dashboard', $data);
    }
}
