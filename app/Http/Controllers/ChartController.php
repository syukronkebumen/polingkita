<?php

namespace App\Http\Controllers;

use App\Charts\SampleChart;
use App\Models\Candidate;
use App\Models\Rekap;

class ChartController extends Controller
{
    public function index()
    {
        $chart = new SampleChart;
        $dataCandidate = Candidate::get();
        $dataWithJml = Candidate::latest();
        $dataWithJml = $dataWithJml->cursor();
        $results = [];
        foreach ($dataWithJml as $query) {
            $selectRekap = Rekap::where('candidat_id', $query->id)->count();
            $results[] = [
                "id" => $query->id,
                "nama_ketua" => $query->nama_ketua,
                "photo_paslon" => $query->photo_paslon,
                "jumlah" => $selectRekap
            ];
        }

        $dataLoop = [];
        foreach ($dataCandidate as $key => $value) {
            array_push($dataLoop, $value->nama_ketua);
        }

        $jumlahCandidate = Candidate::select(
            'candidates.id',
            'candidates.nama_ketua',
            'candidates.photo_paslon',
            'rekap_suara.candidat_id'
        )
        ->leftjoin('rekap_suara','rekap_suara.candidat_id','=','candidates.id')
        ->get();

        $candidatCount = $jumlahCandidate->groupBy('candidat_id')->map(function ($row) {
            return $row->count();
        });

        $arrData = [];
        foreach ($candidatCount as $key => $value) {
            array_push($arrData, $value);
        }

        $chart->labels($dataLoop);
        $chart->dataset('Jumlah', 'pie', $arrData);
        $jumlah = Rekap::count();
        return view('hasil-polling', ['chart' => $chart, 'jumlah' => $jumlah, 'candidates' => $results]);
    }
}