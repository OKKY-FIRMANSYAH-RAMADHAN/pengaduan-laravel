<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $data['judul'] = "Dashboard";
        return view('dashboard', $data);
    }
}
