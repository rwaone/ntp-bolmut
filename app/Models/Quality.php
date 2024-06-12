<?php

namespace App\Models;

use App\Models\Data;
use App\Models\Commodity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quality extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $load = ['datas'];
    protected $with = ['commodity'];
    

    public function datas()
    {
        return $this->hasMany(Data::class);
    }

    public function commodity()
    {
        return $this->belongsTo(Commodity::class);
    }
}
