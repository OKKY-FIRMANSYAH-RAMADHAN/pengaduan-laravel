<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\User;
use App\Models\fotoPengaduan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        if (session()->has('login.user')) {
            $user = User::where('id_user', session('id_user'))->first();
            $pengaduan = Pengaduan::where('id_pengadu', session('id_user'))->orderByDesc('created_at')->get();
        }

        $data['user'] = $user;
        $data['judul'] = "Daftar Pengaduan";
        $data['pengaduan'] = $pengaduan;
        return view('pengaduan', $data);
    }

    public function store(Request $request)
    {
        $pengaduan = new Pengaduan();
        $pengaduan->tentang_pengaduan = $request->tentang_pengaduan;
        $pengaduan->deskripsi_pengaduan = $request->deskripsi_pengaduan;
        $pengaduan->id_pengadu = $request->id_pengadu;
        $pengaduan->nama_pengadu = $request->nama_pengadu;
        $pengaduan->save();

        $id_pengaduan = $pengaduan->id_pengaduan;
        $files = $request->file('files');

        foreach ($files as $file) {
            $randomFileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/uploads/bukti/' . $id_pengaduan . ''), $randomFileName);
            $fotoPengaduan = new fotoPengaduan();
            $fotoPengaduan->id_pengaduan = $id_pengaduan;
            $fotoPengaduan->nama_foto = $randomFileName;
            $fotoPengaduan->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Membuat Pengaduan.'
        ])->header('Content-Type', 'application/json');
    }

    public function detail($id)
    {
        $data['pengaduan'] = Pengaduan::where('id_pengaduan', $id)->get();
        $data['gambar'] = fotoPengaduan::where('id_pengaduan', $data['pengaduan'][0]->id_pengaduan)->get();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengaduan = Pengaduan::find($id);
        if ($pengaduan) {
            File::deleteDirectory(public_path('assets/uploads/bukti/' . $id));
            Pengaduan::destroy($id);

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil Menghapus Pengaduan.'
            ])->header('Content-Type', 'application/json');
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal Menghapus Pengaduan.'
            ])->header('Content-Type', 'application/json');
        }
    }
}
