<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Maatwebsite\Excel\Concerns\Importable;

class PemainKlub extends Model
{
    use HasFactory,Importable;

    protected $table = 'pemain_klub';
    
    public $timestamps = false;

    protected $fillable = [
        'nama_pemain',
        'nomor_punggung',
        'posisi',
        'klub_id',
    ];
    
    public function klub()
    {
        return $this->belongsTo('App\Models\KlubBola', 'klub_id', 'id');
    }
    // public static function getTableColumns()
    // {
    //     return DB::getSchemaBuilder()->getColumnListing("dosen");
    // }
}
