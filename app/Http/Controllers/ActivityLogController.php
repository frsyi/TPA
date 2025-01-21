<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $currentMonth = date('Y-m');

        $date = $request->input('date', $currentMonth);

        $query = ActivityLog::with('pengajar')
            ->select('pengajar_id', DB::raw('COUNT(*) as total_activities'), DB::raw('COUNT(DISTINCT DATE(created_at)) as total_days'))
            ->whereYear('created_at', '=', date('Y', strtotime($date)))
            ->whereMonth('created_at', '=', date('m', strtotime($date)))
            ->groupBy('pengajar_id');

        if ($request->filled('search')) {
            $query->whereHas('pengajar', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->input('search') . '%');
            });
        }

        $logs = $query->paginate(10)->withQueryString();

        $monthName = date('F Y', strtotime($date));

        return view('activity_logs.index', compact('logs', 'monthName', 'date'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pengajar = User::findOrFail($id);
        $logs = ActivityLog::where('pengajar_id', $id)->with(['hafalan', 'iqra'])->paginate(10);

        $currentMonth = date('F Y');

        return view('activity_logs.show', compact('pengajar', 'logs', 'currentMonth'));
    }
}
