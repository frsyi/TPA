<?php

namespace App\Http\Controllers;

use App\Models\Iqra;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('iqra.show', compact('iqra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
