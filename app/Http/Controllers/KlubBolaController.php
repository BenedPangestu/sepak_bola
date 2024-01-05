<?php

namespace App\Http\Controllers;

use App\Models\KlubBola;
use App\Http\Requests\StoreKlubBolaRequest;
use App\Http\Requests\UpdateKlubBolaRequest;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class KlubBolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klub = KlubBola::all();

        return view('admin.klub', compact('klub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.inputKlub');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKlubBolaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'nama' => 'required|unique:klub_bola|max:100',
            'kota_asal' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg'
        ]);
        if (!$valid) {
            return redirect('admin/klub')
                        ->withErrors($valid)
                        ->withInput();
        }
        $filename = time()."-Klub".'.'.$request->gambar->extension();
        $request->file('gambar')->move('assets/media/klub', $filename);
        $create = KlubBola::create([
            'nama' => $request->nama,
            'kota_asal' => $request->kota_asal,
            'gambar' => $filename,
        ]);
        // $request->gambar->move(public_path('asssets/media/klub'), $filename);
        return redirect()->route('admin.klub');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KlubBola  $klubBola
     * @return \Illuminate\Http\Response
     */
    public function show(KlubBola $klubBola)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KlubBola  $klubBola
     * @return \Illuminate\Http\Response
     */
    public function edit(KlubBola $klubBola)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKlubBolaRequest  $request
     * @param  \App\Models\KlubBola  $klubBola
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKlubBolaRequest $request, KlubBola $klubBola)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KlubBola  $klubBola
     * @return \Illuminate\Http\Response
     */
    public function destroy(KlubBola $klubBola)
    {
        //
    }
}
