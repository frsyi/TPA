<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use Illuminate\Http\Request;

class JuzSuratController extends Controller
{
    public function suratsByJuz($juz)
    {
        $surats = Surat::where('juz_id', $juz)->get();
        return response()->json($surats);
    }

    public function ayatsBySurat($surat)
    {
        $surat = Surat::find($surat);
        $ayats = range($surat->mulai_ayat, $surat->akhir_ayat);
        return response()->json($ayats);
    }
}
