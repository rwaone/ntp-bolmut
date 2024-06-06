<?php

namespace App\Models;

use App\Models\Quality;
use App\Models\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Data extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $with = ['response','quality'];

    public function response(){
        return $this->belongsTo(Response::class);
    }

    public function quality(){
        return $this->belongsTo(Quality::class);
    }
}
