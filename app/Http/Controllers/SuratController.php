<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Surat;
use Illuminate\Http\Request;
// Kita tidak lagi butuh Storage, jadi bisa dihapus, tapi biarkan saja tidak apa-apa

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Surat::with('kategori');
        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'LIKE', '%' . $request->search . '%');
        }

        $surat = $query->latest()->paginate(10);

        return view('surat.index', compact('surat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('surat.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|string',
            'file_pdf' => 'required|mimes:pdf|max:2048',
        ]);

        // UBAH BAGIAN INI
        // 1. Ambil file dari request
        $file = $request->file('file_pdf');
        // 2. Buat nama file yang unik
        $fileName = time() . '_' . $file->getClientOriginalName();
        // 3. Pindahkan file ke folder public/pdf
        $file->move(public_path('pdf'), $fileName);

        // UBAH BAGIAN INI JUGA
        Surat::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            // Simpan path relatif terhadap folder public (tanpa 'public/')
            'file_path' => 'pdf/' . $fileName,
        ]);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil diarsipkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Surat $surat)
    {
        return view('surat.show', compact('surat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Surat $surat)
    {
        $kategori = Kategori::all();
        return view('surat.edit', compact('surat', 'kategori'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Surat $surat)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|string',
            'file_pdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        $dataToUpdate = $request->except('file_pdf');

        if ($request->hasFile('file_pdf')) {
            // UBAH BAGIAN INI
            // Hapus file lama dari folder public
            if ($surat->file_path && file_exists(public_path($surat->file_path))) {
                unlink(public_path($surat->file_path));
            }

            // Simpan file baru ke folder public
            $file = $request->file('file_pdf');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('pdf'), $fileName);
            $dataToUpdate['file_path'] = 'pdf/' . $fileName;
        }

        $surat->update($dataToUpdate);

        return redirect()->route('surat.index')->with('success', 'Arsip Surat berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surat $surat)
    {
        // UBAH BAGIAN INI
        // Hapus file dari folder public
        if ($surat->file_path && file_exists(public_path($surat->file_path))) {
            unlink(public_path($surat->file_path));
        }

        $surat->delete();

        return redirect()->route('surat.index')->with('success', 'Arsip Surat berhasil dihapus!');
    }
}