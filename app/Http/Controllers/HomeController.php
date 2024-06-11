<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     $candidates = Candidate::with('users')->paginate(5);
    //     $jumlah = User::where('status','SUDAH')->count();
    //     return view('pilihan.summary',compact('candidates','jumlah'));
    // }

    public function index()
    {
        // $candidates = Candidate::with('users')->paginate(5);
        // $jumlah = User::where('status','SUDAH')->count();
        $candidates = Candidate::get();
        return view('beranda',compact('candidates'));
    }
}
