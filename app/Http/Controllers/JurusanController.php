<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('pagesAdmin.jurusan', compact("jurusan"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosen = Dosen::all();
        return view('pagesAdmin.jurusan.tambah', compact('dosen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateJurusan = $request->validate([
            'kode_jurusan' => 'required|max:5',
            'nama' => 'required|max:255',
            'gelar' => 'required',
            'akreditasi' => 'required|max:1',
            'dosen_id' => 'required'
        ]);

        Jurusan::create($validateJurusan);

        return redirect('/admin/jurusan')->with('success', 'Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dosen = Dosen::all();
        $jurusan = Jurusan::findOrFail($id);
        return view('pagesAdmin.jurusan.edit', compact('dosen', 'jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateJurusan = $request->validate([
            'kode_jurusan' => 'required|max:5',
            'nama' => 'required|max:255',
            'gelar' => 'required',
            'akreditasi' => 'required|max:1',
            'dosen_id' => 'required'
        ]);

        Jurusan::findOrFail($id)->update($validateJurusan);
        return redirect('/admin/jurusan')->with('success', 'Berhasil meng-edit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Jurusan::destroy($id);
        return redirect('/admin/jurusan')->with('success', 'Berhasil meng-hapus data');
    }
}
