<?php

// app/Http/Controllers/KategoriController.php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategoris.index', compact('kategoris'));
    }

    public function create()
    {
        $nextId = Kategori::max('id') + 1; // Mengambil ID terakhir dan menambahkan 1

        return view('kategoris.create', compact('nextId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategoris.index')
                         ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Kategori $kategori)
    {
        return view('kategoris.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategoris.index')
                         ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategoris.index')
                         ->with('success', 'Kategori berhasil dihapus.');
    }
}
