<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Jika tidak ada input tanggal, gunakan bulan dan tahun saat ini
        $currentMonth = date('Y-m');

        // Ambil input tanggal, atau gunakan bulan dan tahun saat ini sebagai default
        $date = $request->input('date', $currentMonth);

        // Query dasar
        $query = ActivityLog::with('pengajar')
            ->select('pengajar_id', DB::raw('COUNT(*) as total_activities'), DB::raw('COUNT(DISTINCT DATE(created_at)) as total_days'))
            ->whereYear('created_at', '=', date('Y', strtotime($date)))
            ->whereMonth('created_at', '=', date('m', strtotime($date)))
            ->groupBy('pengajar_id');

        // Filter berdasarkan nama pengajar
        if ($request->filled('search')) {
            $query->whereHas('pengajar', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->input('search') . '%');
            });
        }

        // Eksekusi query dengan paginasi
        $logs = $query->paginate(10)->withQueryString();

        // Nama bulan untuk ditampilkan di view
        $monthName = date('F Y', strtotime($date));

        return view('activity_logs.index', compact('logs', 'monthName', 'date'));
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
        //
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
