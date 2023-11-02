<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    function index()
    {
        $data['user_nonverif'] = User::where('status_user', 0)->orderByDesc('created_at')->limit(10)->get();
        $data['judul'] = "Dashboard";
        return view('dashboard', $data);
    }
}
