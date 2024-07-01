<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('pagesAdmin.mahasiswa', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('pagesAdmin.mahasiswa.tambah', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiMahasiswa = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:3|confirmed',
            'kode_jurusan' => 'required'
        ]);

        $id = $this->membuatId($validasiMahasiswa['kode_jurusan']);

        $validasiMahasiswa['password'] = bcrypt($validasiMahasiswa['password']);

        $validasiMahasiswa['id'] = $id;

        Mahasiswa::create($validasiMahasiswa);

        return redirect('admin/mahasiswa')->with('success', 'Berhasil menambahkan mahasiswa');
    }

    public function membuatId($jurusan)
    {
        // Ambil tahun saat ini dan ambil dua digit terakhir
        $year = Carbon::now()->year;
        $yearLastDigits = substr($year, -2);


        $jurusan = Jurusan::findOrFail($jurusan);
        if ($jurusan->kode_jurusan == 'RPLA') {
            $kodeJur = str_pad($jurusan->id, 2, '0', STR_PAD_LEFT);
        } elseif ($jurusan->kode_jurusan == 'TI') {
            $kodeJur = str_pad($jurusan->id, 2, '0', STR_PAD_LEFT);
        } elseif ($jurusan->kode_jurusan == 'SI') {
            $kodeJur = str_pad($jurusan->id, 2, '0', STR_PAD_LEFT);
        } elseif ($jurusan->kode_jurusan == 'SIA') {
            $kodeJur = str_pad($jurusan->id, 2, '0', STR_PAD_LEFT);
        } else {
            $kodeJur = 000;
        }

        $currentYearUsers = Mahasiswa::where('id', 'like', $yearLastDigits . $kodeJur . '%')->count();
        $nextNumber = $currentYearUsers + 1;

        // Gabungkan semuanya untuk membuat ID
        $generatedId = $yearLastDigits . $kodeJur . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        // Cek apakah ID sudah ada di database, jika ada, tambahkan nomor urut
        while (Mahasiswa::where('id', $generatedId)->exists()) {
            $nextNumber++;
            $generatedId = $yearLastDigits . $kodeJur . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        }

        return $generatedId;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('pagesAdmin.mahasiswa.lihat', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('pagesAdmin.mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasiMahasiswa = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'nomer_telepon' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'catatan' => 'required',
            'foto' => 'image|file'
        ]);

        if ($request->file('foto')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $validasiMahasiswa['foto'] = $request->file('foto')->store('upload');
        }

        Mahasiswa::findOrFail($id)->update($validasiMahasiswa);

        return redirect('admin/mahasiswa')->with('success', 'berhasil mengedit!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        if ($mahasiswa->foto) {
            Storage::delete($mahasiswa->foto);
        }
        Mahasiswa::destroy($id);
        return redirect('admin/mahasiswa')->with('success', 'Berhasil dihapus!!');
    }
}
