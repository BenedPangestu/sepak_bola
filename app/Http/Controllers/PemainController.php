<?php

namespace App\Http\Controllers;

use App\Exports\ExportPemainBola;
use App\Models\KlubBola;
use App\Http\Requests\StoreKlubBolaRequest;
use App\Http\Requests\UpdateKlubBolaRequest;
use App\Imports\PemainBolaImport;
use App\Imports\PemainImport;
use App\Models\PemainKlub;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use Maatwebsite\Excel\Facades\Excel;

class PemainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemainbola = PemainKlub::with('klub')->get();

        return view('admin.pemainbola.index', compact('pemainbola'));
    }
    public function create()
    {
        return view('admin.pemainbola.input');
    }
    public function store(Request $request)
    {
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_siswa',$nama_file);
 
		// import data
		$excel = Excel::import(new PemainBolaImport, 'file_siswa/'.$nama_file);
        // return $excel;
        // return "hhe";
        return redirect()->route('admin.pemainbola');
    }
    public function cetak(Request $request)
    {
        
		// import data
        $excel = Excel::download(new ExportPemainBola, 'pemainbola.xlsx');
        return $excel;
        // return "hhe";
        return redirect()->route('admin.pemainbola');
    }
}
