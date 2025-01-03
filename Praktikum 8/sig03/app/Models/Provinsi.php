<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected  $table= 'provinsi';
    protected $fillable = ['name', 'alt_name', 'latitude', 'longitude'];
    public static function getPluralName(): string
    {
        return 'Provinsi';  // Atur nama plural sesuai dengan keinginan Anda
    }

    
}
