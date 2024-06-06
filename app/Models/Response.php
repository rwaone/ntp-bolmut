<?php

namespace App\Models;

use App\Models\Data;
use App\Models\Sample;
use App\Models\Petugas;
use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Response extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $load = ['datas'];
    protected $with = ['document','petugas', 'sample'];

    public function datas(){
        return $this->hasMany(Data::class);
    }

    public function document(){
        return $this->belongsTo(Document::class);
    }

    public function petugas(){
        return $this->belongsTo(Petugas::class, 'petugas_id');
    }

    public function pengawas(){
        return $this->belongsTo(Petugas::class, 'pengawas_id');
    }

    public function sample(){
        return $this->belongsTo(Sample::class);
    }
}
