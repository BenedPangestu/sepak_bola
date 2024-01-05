<?php

namespace App\Exports;

use App\Models\PemainKlub;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPemainBola implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PemainKlub::all();
    }
}
