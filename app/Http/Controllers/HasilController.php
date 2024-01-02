<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    //
    public function index()
    {
        // mengambil data dari session
        $data = session('data');
        // mengembalikan view hasil dengan mengirimkan data
        return view('hasil', [
            'data' => $data,
            'hasil' => Pendaftar::all(),
        ]);
    }

    // fungsi untuk mendownload berkas
    public function download($filename)
    {
        // mendeklarasikan path file yang akan didownload
        $filePath = public_path('storage/berkas/' . $filename);
        // mengembalikan response untuk mendownload file
        return response()->download($filePath);
    }
}
