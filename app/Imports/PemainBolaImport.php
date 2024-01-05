<?php

namespace App\Imports;

use App\Models\KlubBola;
use App\Models\PemainBola;
use App\Models\PemainKlub;
use Maatwebsite\Excel\Concerns\ToModel;

class PemainBolaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $klub = KlubBola::where('nama', 'like','%'. $row[2].'%')->first();
        return new PemainKlub([
            'nomor_punggung' => $row[0],
            'nama_pemain' => $row[1],
            'klub_id' => $klub->id,
            'posisi' => $row[3],
        ]);
    }
}
