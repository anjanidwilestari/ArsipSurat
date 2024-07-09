<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $surats = Surat::when($search, function ($query, $search) {
            return $query->where('judul', 'like', "%{$search}%");
        })->get();
        return view('surats.index', compact('surats'));
    }

     // Form untuk menambah surat
     public function create()
     {
         $kategoris = Kategori::all();
         return view('surats.create', compact('kategoris'));
     }
 
     // Simpan surat
     public function store(Request $request)
     {
         $request->validate([
             'nomor_surat' => 'required|string|max:255',
             'judul' => 'required|string|max:255',
             'kategori_id' => 'required|exists:kategoris,id',
             'file' => 'required|mimes:pdf|max:2048', // max 2MB
         ]);
 
         $file = $request->file('file');
         $fileName = time() . '_' . $file->getClientOriginalName();
         $filePath = $file->storeAs('public', $fileName);
 
         $surat = new Surat();
         $surat->nomor_surat = $request->nomor_surat;
         $surat->judul = $request->judul;
         $surat->kategori_id = $request->kategori_id;
         $surat->file = $filePath;
         $surat->save();
 
         return redirect()->route('surats.index')
                          ->with('success', 'Surat berhasil disimpan.');
     }
    
    // Edit view
    public function edit(Surat $surat)
    {
        $kategoris = Kategori::all();
        return view('surats.edit', compact('surat', 'kategoris'));
    }

    // Update surat
    public function update(Request $request, Surat $surat)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'file' => 'nullable|mimes:pdf|max:2048', // max 2MB, boleh kosong jika tidak diubah
        ]);

        // Update data surat
        $surat->nomor_surat = $request->nomor_surat;
        $surat->judul = $request->judul;
        $surat->kategori_id = $request->kategori_id;

        // Cek apakah ada file baru diupload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public', $fileName);

            // Hapus file lama jika ada
            if ($surat->file) {
                Storage::delete($surat->file);
            }

            // Simpan path file baru
            $surat->file = $filePath;
        }

        $surat->save();

        return redirect()->route('surats.show', $surat->id)
                        ->with('success', 'Surat berhasil diperbarui.');
    }

    public function destroy(Surat $surat)
    {
        Storage::delete($surat->file);
        $surat->delete();
        return redirect()->route('surats.index')->with('success', 'Data berhasil dihapus');
    }

    public function show(Surat $surat)
    {
        return view('surats.show', compact('surat'));
    }

    public function download(Surat $surat)
    {
        return Storage::download($surat->file);
    }
}
