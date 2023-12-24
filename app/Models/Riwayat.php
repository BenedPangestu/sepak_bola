<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $table = 'riwayat_pertandingan';

    public $timestamps = false;

    protected $fillable = [
        'klub_1',
        'klub_2',
        'score_klub1',
        'score_klub2',
    ];
    
    public function klub1()
    {
        return $this->belongsTo('App\Models\KlubBola', 'klub_1', 'id');
    }
    public function klub2()
    {
        return $this->belongsTo('App\Models\KlubBola', 'klub_2', 'id');
    }
    // public static function getTableColumns()
    // {
    //     return DB::getSchemaBuilder()->getColumnListing("dosen");
    // }
}
