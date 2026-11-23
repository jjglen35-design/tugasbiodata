<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;

class BiodataController extends Controller
{
    // Menampilkan halaman publik (Root Path)
    public function index()
    {
        // Ambil baris data pertama dari tabel biodatas
        $biodata = Biodata::first(); 
        return view('welcome', compact('biodata'));
    }

    // Menampilkan halaman form manajemen admin
    public function edit()
    {
        $biodata = Biodata::first();
        return view('admin.edit', compact('biodata'));
    }

    // Menyimpan perubahan konten dari admin
    public function update(Request $request)
    {
        $request->validate([
            'welcome_message' => 'required|string|max:255',
            'nama_lengkap'    => 'required|string|max:100',
            'tentang_saya'    => 'required|string',
        ]);

        $biodata = Biodata::first();
        $biodata->update([
            'welcome_message' => $request->welcome_message,
            'nama_lengkap'    => $request->nama_lengkap,
            'tentang_saya'    => $request->tentang_saya,
        ]);

        return redirect()->route('admin.index')->with('sukses', 'Konten halaman depan berhasil diperbarui!');
    }
}