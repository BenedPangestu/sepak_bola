<?php

namespace App\Http\Controllers;

use App\Models\Klasemen;
use App\Http\Requests\StoreKlasemenRequest;
use App\Http\Requests\UpdateKlasemenRequest;
use App\Models\KlubBola;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KlasemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klasemen = Klasemen::with('klub')->orderBy('point', 'desc')->get();

        return view('admin.klasemen', compact('klasemen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klub = KlubBola::all();


        return view('admin.inputKlasemen', compact('klub'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKlasemenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for ($i = 0; $i < count($request->klub_1); $i++) {
            $data[] = ([
                'klub_1' => $request->klub_1[$i],
                'score_klub1' => $request->score_klub1[$i],
                'klub_2' => $request->klub_2[$i],
                'score_klub2' => $request->score_klub2[$i],
            ]);
        }
        
        foreach ($data as $item) {
            $valid = Validator::make($item, [
                    'klub_1' => 'required',
                    'score_klub1' => 'required',
                    'klub_2' => 'required',
                    'score_klub2' => 'required',
            ]);
            if ($valid->fails()) {
                return redirect('admin/klasemen')
                        ->withErrors($valid)
                        ->withInput();
            }
            if ($item['klub_1'] == $item['klub_2']) {
                return redirect('admin/klasemen')
                    ->withErrors("Klub tidak bisa sama")
                    ->withInput();
            }
            $riwayat = Riwayat::with('klub1', 'klub2')
                ->whereIn('klub_1', [$item['klub_1'], $item['klub_2']])
                ->whereIn('klub_2', [$item['klub_1'], $item['klub_2']])
                ->get();
            if (count($riwayat) == 0) {
                $insert[] = Riwayat::create([
                    'klub_1' => $item['klub_1'],
                    'score_klub1' => $item['score_klub1'],
                    'klub_2' => $item['klub_2'],
                    'score_klub2' => $item['score_klub2'],
                ]);

                // insert klasemen
                if ($item['score_klub1'] > $item['score_klub2']) {
                    // klub 1 menang
                    $Klasmenmenang = Klasemen::where('id_klub',$item['klub_1'])->first();
                    if ($Klasmenmenang == null) {
                        $klasemen[] = Klasemen::Create([
                            'id_klub' => $item['klub_1'],
                            'menang' => 1,
                            'kalah' => 0,
                            'seri' => 0,
                            'bermain' => 1,
                            'goal_menang' => $item['score_klub1'],
                            'goal_kalah' => $item['score_klub2'],
                            'point' => 3
                        ]);
                    } else {
                        $Klasmenmenang->menang = ($Klasmenmenang->menang + 1);
                        $Klasmenmenang->bermain = ($Klasmenmenang->bermain + 1);
                        $Klasmenmenang->point = ($Klasmenmenang->point + 3);
                        $Klasmenmenang->goal_menang = ($Klasmenmenang->goal_menang + $item['score_klub1']);
                        $Klasmenmenang->goal_kalah = ($Klasmenmenang->goal_kalah + $item['score_klub2']);
                        $Klasmenmenang->save();
                    }
                    // klub 2 kalah
                    $klasemenKalah = Klasemen::where('id_klub',$item['klub_2'])->first();
                    if ($klasemenKalah == null) {
                        $klasemen[] =  Klasemen::Create([
                            'id_klub' => $item['klub_2'],
                            'menang' => 0,
                            'kalah' => 1,
                            'seri' => 0,
                            'bermain' => 1,
                            'point' => 0,
                            'goal_menang' => $item['score_klub2'],
                            'goal_kalah' => $item['score_klub1']
                        ]);
                    } else {
                        $klasemenKalah->kalah = ($klasemenKalah->kalah + 1);
                        $klasemenKalah->bermain = ($klasemenKalah->bermain + 1);
                        $klasemenKalah->goal_menang = ($klasemenKalah->goal_menang + $item['score_klub2']);
                        $klasemenKalah->goal_kalah = ($klasemenKalah->goal_kalah + $item['score_klub1']);
                        $klasemenKalah->save();
                    }
                } else if($item['score_klub2'] > $item['score_klub1']){
                    // klub 2 menang
                    $Klasmenmenang = Klasemen::where('id_klub',$item['klub_2'])->first();
                    if ($Klasmenmenang == null) {
                        $klasemen[] = Klasemen::Create([
                            'id_klub' => $item['klub_2'],
                            'menang' => 1,
                            'kalah' => 0,
                            'seri' => 0,
                            'bermain' => 1,
                            'goal_menang' => $item['score_klub2'],
                            'goal_kalah' => $item['score_klub1'],
                            'point' => 3
                        ]);
                    } else {
                        $Klasmenmenang->menang = ($Klasmenmenang->menang + 1);
                        $Klasmenmenang->bermain = ($Klasmenmenang->bermain + 1);
                        $Klasmenmenang->point = ($Klasmenmenang->point + 3);
                        $Klasmenmenang->goal_menang = ($Klasmenmenang->goal_menang + $item['score_klub2']);
                        $Klasmenmenang->goal_kalah = ($Klasmenmenang->goal_kalah + $item['score_klub1']);
                        $Klasmenmenang->save();
                    }
                    // klub 1 kalah
                    $klasemenKalah = Klasemen::where('id_klub',$item['klub_1'])->first();
                    if ($klasemenKalah == null) {
                        $klasemen[] = Klasemen::Create([
                            'id_klub' => $item['klub_1'],
                            'menang' => 0,
                            'kalah' => 1,
                            'seri' => 0,
                            'bermain' => 1,
                            'point' => 0,
                            'goal_menang' => $item['score_klub1'],
                            'goal_kalah' => $item['score_klub2']
                        ]);
                    } else {
                        $klasemenKalah->kalah = ($klasemenKalah->kalah + 1);
                        $klasemenKalah->bermain = ($klasemenKalah->bermain + 1);
                        $klasemenKalah->goal_menang = ($klasemenKalah->goal_menang + $item['score_klub1']);
                        $klasemenKalah->goal_kalah = ($klasemenKalah->goal_kalah + $item['score_klub2']);
                        $klasemenKalah->save();
                    }
                } else {
                    // klub 2 seri
                    $Klasmenmenang = Klasemen::where('id_klub',$item['klub_2'])->first();
                    if ($Klasmenmenang == null) {
                        $klasemen[] = Klasemen::Create([
                            'id_klub' => $item['klub_2'],
                            'menang' => 0,
                            'kalah' => 0,
                            'seri' => 1,
                            'bermain' => 1,
                            'goal_menang' => $item['score_klub2'],
                            'goal_kalah' => $item['score_klub1'],
                            'point' => 1
                        ]);
                    } else {
                        $Klasmenmenang->menang = ($Klasmenmenang->seri + 1);
                        $Klasmenmenang->bermain = ($Klasmenmenang->bermain + 1);
                        $Klasmenmenang->point = ($Klasmenmenang->point + 1);
                        $Klasmenmenang->goal_menang = ($Klasmenmenang->goal_menang + $item['score_klub2']);
                        $Klasmenmenang->goal_kalah = ($Klasmenmenang->goal_kalah + $item['score_klub1']);
                        $Klasmenmenang->save();
                    }
                    // klub 1 seri
                    $klasemenKalah = Klasemen::where('id_klub',$item['klub_1'])->first();
                    if ($klasemenKalah == null) {

                        $klasemen[] = Klasemen::Create([
                            'id_klub' => $item['klub_1'],
                            'menang' => 0,
                            'kalah' => 0,
                            'seri' => 1,
                            'bermain' => 1,
                            'goal_menang' => $item['score_klub1'],
                            'goal_kalah' => $item['score_klub2'],
                            'point' => 1,
                        ]);
                    } else {

                        $klasemenKalah->menang = ($klasemenKalah->seri + 1);
                        $klasemenKalah->bermain = ($klasemenKalah->bermain + 1);
                        $klasemenKalah->point = ($klasemenKalah->point + 1);
                        $klasemenKalah->goal_menang = ($klasemenKalah->goal_menang + $item['score_klub1']);
                        $klasemenKalah->goal_kalah = ($klasemenKalah->goal_kalah + $item['score_klub2']);
                        $klasemenKalah->save();
                    }
                }
            } else {
                return redirect('admin/klasemen/input')
                    ->withErrors("Pertandingan sudah ada")
                    ->withInput();
            }
        }

        return redirect()->route('admin.klasemen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Klasemen  $klasemen
     * @return \Illuminate\Http\Response
     */
    public function show(Klasemen $klasemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Klasemen  $klasemen
     * @return \Illuminate\Http\Response
     */
    public function edit(Klasemen $klasemen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKlasemenRequest  $request
     * @param  \App\Models\Klasemen  $klasemen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKlasemenRequest $request, Klasemen $klasemen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Klasemen  $klasemen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Klasemen $klasemen)
    {
        //
    }
}
