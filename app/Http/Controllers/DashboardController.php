<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Hafalan;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $progresHafalanSiswa = null;
        $bulanDipilih = $request->query('bulan', Carbon::now()->format('Y-m'));
        $bulan = Carbon::parse($bulanDipilih)->month;
        $tahun = Carbon::parse($bulanDipilih)->year;

        if ($user->role === User::ROLE_ORANGTUA) {
            $siswa = $user->siswa;

            $progresHafalanBulanan = Hafalan::where('siswa_id', $siswa->id)
                ->whereYear('created_at', $tahun)
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
            $bulanSekarang = Carbon::parse($bulanDipilih)->translatedFormat('F Y');

            $progresHafalanBulanan = Hafalan::whereYear('hafalans.created_at', $tahun)
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

            $progresHafalanSiswa = Hafalan::whereYear('hafalans.created_at', $tahun)
                ->whereMonth('hafalans.created_at', $bulan)
                ->join('siswas', 'hafalans.siswa_id', '=', 'siswas.id')
                ->selectRaw('siswas.nama as nama_siswa, COUNT(hafalans.id) as total_hafalan')
                ->groupBy('siswas.nama')
                ->orderBy('total_hafalan', 'desc')
                ->get()
                ->toArray();
        }

        $bulanSebelumnya = Carbon::parse($bulanDipilih)->subMonth()->format('Y-m');
        $bulanBerikutnya = Carbon::parse($bulanDipilih)->addMonth()->format('Y-m');

        return view('dashboard', [
            'jumlahSiswa' => $jumlahSiswa ?? null,
            'jumlahPengajar' => $jumlahPengajar ?? null,
            'progresHafalanBulanan' => json_encode($progresHafalanBulanan, JSON_UNESCAPED_UNICODE),
            'progresHafalanSiswa' => json_encode($progresHafalanSiswa, JSON_UNESCAPED_UNICODE) ?? null,
            'bulanSekarang' => $bulanSekarang ?? null,
            'bulanDipilih' => $bulanDipilih,
            'bulanSebelumnya' => $bulanSebelumnya,
            'bulanBerikutnya' => $bulanBerikutnya,
        ]);
    }
}
