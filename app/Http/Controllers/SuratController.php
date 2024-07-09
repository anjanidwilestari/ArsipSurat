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

    public function create()
    {
        $kategoris = Kategori::all();
        return view('surats.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'file' => 'required|mimes:pdf',
            'kategori_id' => 'required'
        ]);

        $filePath = $request->file('file')->store('public/files');
        Surat::create([
            'judul' => $request->judul,
            'file_path' => $filePath,
            'kategori_id' => $request->kategori_id
        ]);

        return redirect()->route('surats.index')->with('success', 'Data berhasil disimpan');
    }

    public function destroy(Surat $surat)
    {
        Storage::delete($surat->file_path);
        $surat->delete();
        return redirect()->route('surats.index')->with('success', 'Data berhasil dihapus');
    }

    public function show(Surat $surat)
    {
        return view('surats.show', compact('surat'));
    }

    public function download(Surat $surat)
    {
        return Storage::download($surat->file_path);
    }
}
