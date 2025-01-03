<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    protected $table = 'desa';
    protected $fillable = ['name', 'alt-name', 'latitude', 'longitude', 'kecamatan_id'];

    function provinsi(){
        return $this->belongsTo(Kecamatan::class);
    }
}
