<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')
            ->with('success', 'Data Siswa berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        $hafalans = $siswa->hafalans()->with('pengajar', 'juz', 'surat')->get();
        return view('siswa.show', compact('siswa', 'hafalans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Data Siswa berhasil dihapus!');
    }
}
