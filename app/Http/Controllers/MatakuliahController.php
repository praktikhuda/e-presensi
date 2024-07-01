<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matakuliah = Matakuliah::all();
        return view('pagesAdmin.matakuliah', compact('matakuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('pagesAdmin.matakuliah.tambah', compact('jurusan'));
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
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $validateMatakuliah['foto'] = $request->file('foto')->store('upload');
        }

        $validateMatakuliah['dosen_id'] = $request->dosen_id;

        Matakuliah::create($validateMatakuliah);

        return redirect('admin/matakuliah')->with('success', 'Berhasil menambah Matakuliah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        return view('pagesAdmin.matakuliah.lihat', compact('matakuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
