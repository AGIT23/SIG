<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatan';
    protected $fillable = ['name','alt_name', 'latitude', 'longitude', 'kabkota_id'];

    function kabkota(){
        return $this->belongTo(Kabkota::class);
    }
}
