<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('pagesAdmin.dashboard');
    }

    // TABEL DOSEN
    public function dosen()
    {
        $dosen = Dosen::latest()->get();
        return view('pagesAdmin.dosen', compact('dosen'));
    }

    public function dosenLihat()
    {
        return view('pagesAdmin.dosen.tambah');
    }

    public function dosenTambah(Request $request)
    {
        $id = $this->membuatId();
        $dosen = Dosen::latest()->get();
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:3|confirmed',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        Dosen::create($validatedData);

        return redirect('admin/dosen')->with('success', 'Berhasil menambahkan dosen!!');
    }

    public function membuatId()
    {
        // Ambil tahun saat ini dan ambil dua digit terakhir
        $year = Carbon::now()->year;
        $yearLastDigits = substr($year, -2);

        // Angka khusus
        $specialNumber = 55198;

        // Cari nomor urut berikutnya berdasarkan tahun saat ini
        $currentYearUsers = Dosen::where('id', 'like', $yearLastDigits . $specialNumber . '%')->count();
        $nextNumber = $currentYearUsers + 1;

        // Gabungkan semuanya untuk membuat ID
        $generatedId = $yearLastDigits . $specialNumber . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        // Cek apakah ID sudah ada di database, jika ada, tambahkan nomor urut
        while (Dosen::where('id', $generatedId)->exists()) {
            $nextNumber++;
            $generatedId = $yearLastDigits . $specialNumber . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        }

        return $generatedId;
    }

    public function lihat(string $id)
    {
        $dosen = Dosen::where('id', $id)->first();
        return view('pagesAdmin.dosen.lihat', compact('dosen'));
    }

    public function edit(string $id)
    {
        $dosen = Dosen::where('id', $id)->first();
        return view('pagesAdmin.dosen.edit', compact('dosen'));
    }

    public function store(Request $request, string $id)
    {
        $validateDosen = $request->validate([
            'email' => 'required|email',
            'nama' => 'required|string|max:255',
            'nip' => 'required|max:22',
            'jabatan_akademik' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|max:255',
            'nomer_telepon' => 'required|max:16',
            'bidang_keahlian' => 'required|max:255',
            'catatan' => 'required|max:255',
            'foto' => 'image|file'
        ]);

        if ($request->file('foto')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $validateDosen['foto'] = $request->file('foto')->store('upload');
        }

        Dosen::findOrFail($id)->update($validateDosen);

        return redirect('admin/dosen')->with('success', 'Berhasil mengedit dosen!!');
    }

    public function hapus(string $id)
    {
        $dosen = Dosen::findOrFail($id);
        if ($dosen->foto) {
            Storage::delete($dosen->foto);
        }
        Dosen::destroy($id);
        return redirect('admin/dosen')->with('success', 'Berhasil dihapus!!');
    }

    public function matakuliah()
    {
        return view('pagesMatakuliah.matakuliah');
    }

    public function calender(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));

        $presensi = Presensi::select(
            'tanggal_presensi',
            'catatan',
        )->groupBy('tanggal_presensi', 'catatan')->where('tanggal_presensi', '>=', $start)->get()->map(fn ($item) => [
            'title' => $item->catatan,
            'start' => $item->tanggal_presensi
        ]);
        return response()->json($presensi);
    }

    public function tamppilCalendar()
    {
        return view('pagesAdmin.calender');
    }
}
