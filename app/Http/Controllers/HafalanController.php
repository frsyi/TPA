<?php

namespace App\Http\Controllers;

use App\Models\Juz;
use App\Models\Siswa;
use App\Models\Surat;
use App\Models\Hafalan;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HafalanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Hafalan::query();

        if ($request->filled('search')) {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('date')) {
            $date = Carbon::parse($request->date);
            $query->whereMonth('created_at', $date->month)
                ->whereYear('created_at', $date->year);
        }

        $hafalans = $query->with('siswa', 'pengajar')->get();

        return view('hafalan.index', compact('hafalans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswas = Siswa::orderBy('nama', 'asc')->get();
        $juzs = Juz::all();
        $surats = Surat::where('juz_id', $juzs->first()->id)->get();
        return view('hafalan.create', compact('siswas', 'juzs', 'surats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'siswa_id' => 'required|integer|exists:siswas,id',
                'juz_id' => 'required|integer|exists:juzs,id',
                'surat_id' => 'required|integer|exists:surats,id',
                'mulai_ayat' => 'required|integer',
                'akhir_ayat' => 'required|integer|gt:mulai_ayat',
                'nilai' => 'required|string|max:255',
                'catatan' => 'nullable|string',
            ],
            [
                'akhir_ayat.gt' => 'Akhir ayat harus lebih besar dari ayat mulai.',
            ]
        );

        $hafalan = Hafalan::create([
            'siswa_id' => $request->siswa_id,
            'juz_id' => $request->juz_id,
            'surat_id' => $request->surat_id,
            'mulai_ayat' => $request->mulai_ayat,
            'akhir_ayat' => $request->akhir_ayat,
            'nilai' => $request->nilai,
            'catatan' => $request->catatan,
            'pengajar_id' => Auth::id(),
        ]);

        ActivityLog::create([
            'pengajar_id' => Auth::id(),
            'activity' => 'create-hafalan',
            'hafalan_id' => $hafalan->id,
        ]);

        return redirect()->route('hafalan.index')->with('success', 'Data hafalan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hafalan $hafalan)
    {
        return view('hafalan.show', compact('hafalan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hafalan $hafalan)
    {
        $siswas = Siswa::orderBy('nama', 'asc')->get();
        $juzs = Juz::all();
        $surats = Surat::where('juz_id', $juzs->first()->id)->get();
        return view('hafalan.edit', compact('hafalan',  'siswas',  'juzs',  'surats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hafalan $hafalan)
    {
        $request->validate(
            [
                'siswa_id' => 'required|integer|exists:siswas,id',
                'juz_id' => 'required|integer|exists:juzs,id',
                'surat_id' => 'required|integer|exists:surats,id',
                'mulai_ayat' => 'required|integer',
                'akhir_ayat' => 'required|integer|gt:mulai_ayat',
                'nilai' => 'required|string|max:255',
                'catatan' => 'nullable|string',
            ],
            [
                'akhir_ayat.gt' => 'Akhir ayat harus lebih besar dari ayat mulai.',
            ]
        );

        $hafalan->update([
            'siswa_id' => $request->siswa_id,
            'juz_id' => $request->juz_id,
            'surat_id' => $request->surat_id,
            'mulai_ayat' => $request->mulai_ayat,
            'akhir_ayat' => $request->akhir_ayat,
            'nilai' => $request->nilai,
            'catatan' => $request->catatan,
        ]);

        ActivityLog::create([
            'pengajar_id' => Auth::id(),
            'activity' => 'update-hafalan',
            'hafalan_id' => $hafalan->id,
        ]);

        return redirect()->route('hafalan.index')->with('success', 'Data hafalan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hafalan $hafalan)
    {
        ActivityLog::create([
            'pengajar_id' => Auth::id(),
            'activity' => 'delete-hafalan',
            'hafalan_id' => $hafalan->id,
        ]);

        $hafalan->delete();

        return redirect()->route('hafalan.index')->with('success', 'Data hafalan berhasil dihapus!');
    }

    public function getSuratsByJuz($id)
    {
        $surats = Surat::where('juz_id', $id)->get();
        return response()->json($surats);
    }

    public function getAyatsBySurat($id)
    {
        $surat = Surat::find($id);
        $ayats = range($surat->mulai_ayat, $surat->akhir_ayat);
        return response()->json($ayats);
    }
}
