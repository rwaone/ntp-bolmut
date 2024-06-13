<?php

namespace App\Models;

use App\Models\Sample;
use App\Models\Kecamatan;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Desa extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $load = ['sample'];
    protected $with = ['kecamatan'];

    public function sample(){
        return $this->hasMany(Sample::class);
    }

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
}
