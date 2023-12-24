<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlubBola extends Model
{
    use HasFactory;

    protected $table = 'klub_bola';
    
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'kota_asal',
        'password',
        'gambar',
    ];
    
    // public function user()
    // {
    //     return $this->belongsTo('App\Models\UserModel', 'created_by', 'id');
    // }
    // public static function getTableColumns()
    // {
    //     return DB::getSchemaBuilder()->getColumnListing("dosen");
    // }
}
