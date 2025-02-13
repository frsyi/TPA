<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Hafalan;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $progresHafalanSiswa = null;

        if ($user->role === User::ROLE_ORANGTUA) {
            $siswa = $user->siswa;

            $progresHafalanBulanan = Hafalan::where('siswa_id', $siswa->id)
                ->selectRaw('MONTH(created_at) as bulan, COUNT(*) as total_hafalan')
                ->groupBy('bulan')
                ->orderBy('bulan')
                ->get()
                ->map(function ($item) {
                    return [
                        'bulan' => Carbon::create()->month($item->bulan)->translatedFormat('F'),
                        'total_hafalan' => $item->total_hafalan
                    ];
                })->toArray();
        } else {
            $jumlahSiswa = Siswa::count();
            $jumlahPengajar = User::where('role', 'pengajar')->count();
            $bulanSekarang = Carbon::now()->translatedFormat('F Y');

            $progresHafalanBulanan = Hafalan::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total_hafalan')
                ->groupBy('bulan')
                ->orderBy('bulan')
                ->get()
                ->map(function ($item) {
                    return [
                        'bulan' => Carbon::create()->month($item->bulan)->translatedFormat('F'),
                        'total_hafalan' => $item->total_hafalan
                    ];
                })->toArray();

            $progresHafalanSiswa = Hafalan::whereMonth('hafalans.created_at', Carbon::now()->month)
                ->join('siswas', 'hafalans.siswa_id', '=', 'siswas.id')
                ->selectRaw('siswas.nama as nama_siswa, COUNT(hafalans.id) as total_hafalan')
                ->groupBy('siswas.nama')
                ->orderBy('total_hafalan', 'desc')
                ->get()
                ->toArray();
        }

        return view('dashboard', [
            'jumlahSiswa' => $jumlahSiswa ?? null,
            'jumlahPengajar' => $jumlahPengajar ?? null,
            'progresHafalanBulanan' => json_encode($progresHafalanBulanan, JSON_UNESCAPED_UNICODE),
            'progresHafalanSiswa' => json_encode($progresHafalanSiswa, JSON_UNESCAPED_UNICODE) ?? null,
            'bulanSekarang' => $bulanSekarang ?? null,
        ]);
    }

    // public function index()
    // {
    //     $jumlahSiswa = Siswa::count();
    //     $jumlahPengajar = User::where('role', 'pengajar')->count();

    //     // Progres Hafalan Per Bulan
    //     $progresHafalanBulanan = Hafalan::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total_hafalan')
    //         ->groupBy('bulan')
    //         ->orderBy('bulan')
    //         ->get()
    //         ->map(function ($item) {
    //             return [
    //                 'bulan' => Carbon::create()->month($item->bulan)->translatedFormat('F'), // Nama bulan
    //                 'total_hafalan' => $item->total_hafalan
    //             ];
    //         })->toArray(); // Ubah Collection menjadi array

    //     return view('dashboard', [
    //         'jumlahSiswa' => $jumlahSiswa,
    //         'jumlahPengajar' => $jumlahPengajar,
    //         'progresHafalanBulanan' => json_encode($progresHafalanBulanan) // Pastikan dalam format JSON
    //     ]);
    // }

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
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
