<?php

namespace App\Http\Controllers;

use App\Models\Iqra;
use App\Models\Siswa;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class IqraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Iqra::query();

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

        $iqras = $query->with('siswa', 'pengajar')->get();

        return view('iqra.index', compact('iqras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswas = Siswa::all();
        return view('iqra.create', compact('siswas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|integer|exists:siswas,id',
            'jilid' => 'required|integer',
            'halaman' => 'required|integer',
            'nilai' => 'required|string|max:255',
            'catatan' => 'nullable|string',
        ]);

        $iqra = Iqra::create([
            'siswa_id' => $request->siswa_id,
            'jilid' => $request->jilid,
            'halaman' => $request->halaman,
            'nilai' => $request->nilai,
            'catatan' => $request->catatan,
            'pengajar_id' => Auth::id(),
        ]);

        ActivityLog::create([
            'pengajar_id' => Auth::id(),
            'activity' => 'create-iqra',
            'iqra_id' => $iqra->id,
        ]);

        return redirect()->route('iqra.index')->with('success', 'Data iqra berhasil ditambahkan!.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Iqra $iqra)
    {
        return view('iqra.show', compact('iqra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Iqra $iqra)
    {
        $siswas = Siswa::all();
        return view('iqra.edit', compact('iqra', 'siswas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Iqra $iqra)
    {
        $request->validate([
            'siswa_id' => 'required|integer|exists:siswas,id',
            'jilid' => 'required|integer',
            'halaman' => 'required|integer',
            'nilai' => 'required|string|max:255',
            'catatan' => 'nullable|string',
        ]);

        $iqra->update([
            'siswa_id' => $request->siswa_id,
            'jilid' => $request->jilid,
            'halaman' => $request->halaman,
            'nilai' => $request->nilai,
            'catatan' => $request->catatan,
            'pengajar_id' => Auth::id(),
        ]);

        ActivityLog::create([
            'pengajar_id' => Auth::id(),
            'activity' => 'update-iqra',
            'iqra_id' => $iqra->id,
        ]);

        return redirect()->route('iqra.index')->with('success', 'Data iqra berhasil diupdate!.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Iqra $iqra)
    {
        ActivityLog::create([
            'pengajar_id' => Auth::id(),
            'activity' => 'delete-iqra',
            'iqra_id' => $iqra->id,
        ]);

        $iqra->delete();

        return redirect()->route('iqra.index')->with('success', 'Data iqra berhasil dihapus!');
    }
}
