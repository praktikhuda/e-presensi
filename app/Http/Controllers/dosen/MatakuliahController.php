<?php

namespace App\Http\Controllers\Dosen;

use App\Models\MatMas;
use App\Models\Jurusan;
use App\Models\Presensi;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth()->user()->id;
        $matakuliah = Matakuliah::where('dosen_id', $id)->get();
        return view('pagesDosen.matakuliah', compact('matakuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('pagesDosen.matakuliah.tambah', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateMatakuliah = $request->validate([
            'nama' => 'required',
            'jurusan_id' => 'required',
            'foto' => 'image|file'
        ]);

        if ($request->file('foto')) {
            $validateMatakuliah['foto'] = $request->file('foto')->store('upload');
        } else {
            $validateMatakuliah['foto'] = "noo";
        }

        $validateMatakuliah['dosen_id'] = $request->dosen_id;

        Matakuliah::create($validateMatakuliah);

        return redirect('dosen/matakuliah')->with('success', 'Berhasil menambah Matakuliah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        $presensi = Presensi::select(
            'tanggal_presensi',
            'catatan',
            DB::raw('COUNT(*) as data'),
            DB::raw('SUM(CASE WHEN status = "H" THEN 1 ELSE 0 END) as bPresensi')
        )->groupBy('tanggal_presensi', 'catatan')->where('matakuliah_id', $id)->get();
        return view('pagesDosen.matakuliah.lihat', compact('matakuliah', 'presensi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        $jurusan = Jurusan::all();
        return view('pagesDosen.matakuliah.edit', compact('matakuliah', 'jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateMatakuliah = $request->validate([
            'nama' => 'required',
            'jurusan_id' => 'required',
            'foto' => 'image|file'
        ]);

        if ($request->file('foto')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $validateMatakuliah['foto'] = $request->file('foto')->store('upload');
        } else {
            $validateMatakuliah['foto'] = "noo";
        }

        $validateMatakuliah['dosen_id'] = $request->dosen_id;

        Matakuliah::findOrFail($id)->update($validateMatakuliah);

        return redirect()->route('dosen.matakuliah.lihat', $id)->with('success', 'Berhasil Mengedit Matakuliah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function lihatMahasiswa(string $id)
    {
        $matmas = MatMas::where('matakuliah_id', $id)->get();
        $matakuliah = Matakuliah::findOrFail($id);
        return view('pagesDosen.matakuliah.lihatMahasiswa', compact('matmas', 'matakuliah'));
    }
}
