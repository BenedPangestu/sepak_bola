<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasemen extends Model
{
    use HasFactory;

    protected $table = 'klasemen';
    public $timestamps = false;

    protected $fillable = [
        'id_klub',
        'menang',
        'kalah',
        'seri',
        'bermain',
        'goal_menang',
        'goal_kalah',
        'point',
    ];
    
    public function klub()
    {
        return $this->belongsTo('App\Models\KlubBola', 'id_klub', 'id');
    }
    // public static function getTableColumns()
    // {
    //     return DB::getSchemaBuilder()->getColumnListing("dosen");
    // }
}
