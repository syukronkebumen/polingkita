<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Rekap;
use App\Models\User;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Gate;

class ChoiceController extends Controller
{
    public function __construct(){
        // $this-> middleware(function($request, $next){
        //     if (Gate::allows('manage-pilihan')) return $next($request);

        //     abort(403,'Anda Tidak memiliki Hak Akses');
        // });
    }
    
    public function pilihan()
    {
        $candidate = Candidate::paginate(2);
        return view('pilihan.index', ['candidates'=>$candidate]);
    }

    public function pilih(Request $request)
    {
        $ipAddress = $request->ip();
        $rekapSuara = new Rekap();
        $rekapSuara->candidat_id = $request->candidate_id;
        $rekapSuara->ip_address = $ipAddress;
        // check IP exist
        $checkIp = Rekap::where('ip_address', $ipAddress)->first();
        if ($checkIp) {
            return redirect()->route('home')->with('error', 'Gagal, anda sudah memberikan pilihan sebelumnya');
        }
        $rekapSuara->save();
        return redirect()->route('home')->with('status', 'Selamat anda berhasil memilih !');
    }
}
