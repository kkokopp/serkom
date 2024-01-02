<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Semester;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    // function index untuk menampilkan halaman daftar
    public function index()
    {
        // Menegmablikan view daftar dengan mengirimkan data semesters dan beasiswas
        return view('daftar',[
            'semesters' => Semester::all(),
            'beasiswas' => Beasiswa::all(),
        ]);
    }

    // fungsi store untuk menyimpan data pendaftar ke dalam database
    public function store(Request $request)
    {
        // Validasi data dari request
        $data = request()->validate([
            'nama' => 'required',
            'nim' => 'required | numeric | digits_between:8,8',
            'nomor_hp' => 'required | numeric | digits_between:10,13',
            'email' => 'required | email | email:rfc,dns',
            'semester' => 'required',
            'beasiswa' => 'required',
            'ipk' => 'required',
            'berkas' => 'required | file | mimes:pdf,jpg,png',
        ]);

        // Menyimpan berkas yang diupload ke dalam folder storage/app/public/berkas
        if(request('berkas')){
            $berkas = request('berkas')->store('berkas','public');
            $data['berkas'] = basename($berkas);
        }

        // Mengubah id semester dan id beasiswa menjadi nama semester dan nama beasiswa
        $semester_nama = Semester::where('id', $data['semester'])->first();
        $semester_nama = $semester_nama->name;
        $beasiswa_nama = Beasiswa::where('id', $data['beasiswa'])->first();
        $beasiswa_nama = $beasiswa_nama->name;
        
        // Menyimpan data pendaftar ke dalam database
        Pendaftar::create([
            'nama' => $data['nama'],
            'nim' => $data['nim'],
            'nomor_hp' => $data['nomor_hp'],
            'email' => $data['email'],
            'semester' => $semester_nama,
            'beasiswa' => $beasiswa_nama,
            'ipk' => $data['ipk'],
            'berkas' => $data['berkas'],
            'status' => 'Belum Diverifikasi',
        ]);
        
        // Mengambil data pendaftar terbaru untuk ditampilkan di halaman hasil
        $data = Pendaftar::latest()->first();
        return redirect()->route('hasil')->with('data', $data);
    }
}
