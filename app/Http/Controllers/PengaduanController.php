<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\User;
use App\Models\fotoPengaduan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function index()
    {
        if (session()->has('login.user')) {
            $user = User::where('id_user', session('id_user'))->first();
            $pengaduan = Pengaduan::where('id_pengadu', session('id_user'))->orderByDesc('created_at')->get();
            $data['user'] = $user;
        }elseif(session()->has('login.admin')){
            $pengaduan = Pengaduan::all();
        }

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
            $path = 'public/bukti/'. $id_pengaduan;
            $file->storeAs($path, $randomFileName);

            // Mengatur permission pada folder yang baru dibuat
            $folderPath = storage_path('app/'.$path);
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0755, true);
            } else {
                chmod($folderPath, 0755);
            }

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


    public function filterPengaduan(Request $request)
    {

        if (session()->has('login.user')) {
            $pengaduanQuery = Pengaduan::where('id_pengadu', session('id_user'));
        }elseif (session()->has('login.admin')){
            $pengaduanQuery = Pengaduan::query();
        }

        if ($request->has('status') && !is_null($request->status)) {
            $pengaduanQuery->where('status_pengaduan', $request->status);
        }

        if ($request->has('month') && !is_null($request->month)) {
            $pengaduanQuery->whereMonth('created_at', $request->month);
        }

        if ($request->has('range') && !is_null($request->range)) {
            $dateRange = explode(' to ', $request->range);

            if (isset($dateRange[1])) {
                $startDate = date('Y-m-d 00:00:01', strtotime($dateRange[0]));
                $endDate = date('Y-m-d 23:59:59', strtotime($dateRange[1]));
                $pengaduanQuery->whereBetween('created_at', [$startDate, $endDate]);
            } else {
                $selectedDate = date('Y-m-d', strtotime($dateRange[0]));
                $startDate = $selectedDate . ' 00:00:01';
                $endDate = $selectedDate . ' 23:59:59';
                $pengaduanQuery->whereBetween('created_at', [$startDate, $endDate]);
            }
        }

        $data['pengaduan'] = $pengaduanQuery->orderByDesc('created_at')->get();

        return view('section.pengaduan_list', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function proses($id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->status_pengaduan = 1;
        $pengaduan->save();

        if ($pengaduan) {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil Memproses Pengaduan.'
            ])->header('Content-Type', 'application/json');
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal Memproses Pengaduan.'
            ])->header('Content-Type', 'application/json');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function selesaikan($id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->status_pengaduan = 2;
        $pengaduan->save();

        if ($pengaduan) {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil Menyelesaikan Pengaduan.'
            ])->header('Content-Type', 'application/json');
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal Menyelesaikan Pengaduan.'
            ])->header('Content-Type', 'application/json');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengaduan = Pengaduan::find($id);
        if ($pengaduan) {
            Storage::deleteDirectory('public/bukti/'.$id);
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
