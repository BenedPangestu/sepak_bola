<?php

namespace App\Http\Controllers;

use App\Models\Klasemen;
use App\Models\KlubBola;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $klub = KlubBola::all();
        $riwayat = Riwayat::all();
        $klasemen = Klasemen::with('klub')->orderBy('point', 'desc')->get();
        // dd($klasemen->first()->klub->nama);
        return view('admin.dashboard', compact('klub', 'riwayat', 'klasemen'));
    }
}
