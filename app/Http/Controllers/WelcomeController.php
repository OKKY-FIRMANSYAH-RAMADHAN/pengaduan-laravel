<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\User;

class WelcomeController extends Controller
{
    function index(){
        $data['pengaduan'] = Pengaduan::all();
        $data['user'] = User::all();
        return view('welcome', $data);
    }
}
