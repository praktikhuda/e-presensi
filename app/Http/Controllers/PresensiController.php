<?php

namespace App\Http\Controllers;

use App\Models\MatMas;
use App\Models\Presensi;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        return view('pagesAdmin.presensi.tambah', compact('matakuliah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $validatePresensi = $request->validate([
            'tanggal_presensi' => 'required|date',
            'catatan' => 'max:250'
        ]);

        $jumlah = MatMas::where('matakuliah_id', $id)->get();
        foreach ($jumlah as $jum) {
            Presensi::create([
                'matakuliah_id' => $id,
                'mahasiswa_id' => $jum->mahasiswa_id,
                'tanggal_presensi' => $request->tanggal_presensi,
                'status' => 'B',
                'catatan' => $request->catatan
            ]);
        }

        return redirect('admin/matakuliah')->with('success', 'Berhasil menambah presensi');
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
    public function edit(string $id, string $tgl)
    {
        $matakuliah = Matakuliah::findOrFail($id);

        $presensi = Presensi::select(
            'tanggal_presensi',
            'catatan',
            DB::raw('COUNT(*) as data'),
            DB::raw('SUM(CASE WHEN status = "B" THEN 1 ELSE 0 END) as bPresensi')
        )->groupBy('tanggal_presensi', 'catatan')->where('matakuliah_id', $id)->where('tanggal_presensi', $tgl)->get();

        $epresensi = Presensi::where('matakuliah_id', $id)->where('tanggal_presensi', $tgl)->get();
        return view('pagesAdmin.presensi.edit', compact('matakuliah', 'presensi', 'epresensi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, string $tgl)
    {
        // Validasi input
        $validatedData = $request->validate([
            'tanggal_presensi' => 'required|date',
            'catatan' => 'max:250'
        ]);

        // Ambil semua entri presensi untuk matakuliah dan tanggal tertentu
        $presensis = Presensi::where(['matakuliah_id' => $id, 'tanggal_presensi' => $tgl])->get();

        foreach ($presensis as $presensi) {
            // Update status presensi sesuai mahasiswa_id yang sesuai
            $status = $request->input($presensi->mahasiswa_id);

            // Pastikan hanya update jika status yang dikirim valid (H atau B)
            if ($status === 'H' || $status === 'B') {
                $presensi->tanggal_presensi = $request->tanggal_presensi;
                $presensi->status = $status;
                $presensi->catatan = $request->catatan;
                $presensi->save();
            }
        }

        return redirect()->route('matakuliah.presensi.edit', ['id' => $id, 'tgl' => $tgl])->with('success', 'Berhasil mengedit presensi');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
