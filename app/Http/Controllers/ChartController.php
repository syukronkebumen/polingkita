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
        $dataWithJml = Candidate::latest();
        $dataWithJml = $dataWithJml->cursor();
        $results = [];
        $resJml = [];
        $namaKetua = [];
        foreach ($dataWithJml as $key => $query) {
            $selectRekap = Rekap::where('candidat_id', $query->id)->count();
            $results[] = [
                "id" => $query->id,
                "nama_ketua" => $query->nama_ketua,
                "photo_paslon" => $query->photo_paslon,
                "jumlah" => $selectRekap
            ];

            $resJml[] = $selectRekap;
            $namaKetua[] = $query->nama_ketua;
        }

        usort($results, function($a, $b) {
            return $b['jumlah'] <=> $a['jumlah'];
        });

        $chart->labels($namaKetua);
        $chart->dataset('Jumlah', 'pie', $resJml);
        $jumlah = Rekap::count();
        return view('hasil-polling', ['chart' => $chart, 'jumlah' => $jumlah, 'candidates' => $results]);
    }
}