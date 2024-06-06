<?php

namespace App\Models;

use App\Models\Desa;
use App\Models\Kabupaten;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $load = ['desa'];
    protected $with = ['kabupaten'];

    public function desa(){
        return $this->hasMany(Desa::class);
    }

    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class);
    }
}
