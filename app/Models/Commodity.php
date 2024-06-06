<?php

namespace App\Models;

use App\Models\Quality;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commodity extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $load = ['qualities'];
    protected $with = ['group'];

    public function qualities(){
        return $this->hasMany(Quality::class);
    }

    public function group(){
        return $this->belongsTo(Group::class);
    }
}
