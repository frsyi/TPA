<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use Illuminate\Http\Request;

class JuzSuratController extends Controller
{
    // public function getSuratsByJuz($id)
    // {
    //     $surats = Surat::where('juz_id', $id)->get();
    //     return response()->json($surats);
    // }

    // public function getAyatsBySurat($id)
    // {
    //     $surat = Surat::find($id);
    //     $ayats = range($surat->mulai_ayat, $surat->akhir_ayat);
    //     return response()->json($ayats);
    // }
}
