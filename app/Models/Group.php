<?php

namespace App\Models;

use App\Models\Section;
use App\Models\Commodity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $load = ['commodities'];
    protected $with = ['section'];

    public function commodities(){
        return $this->hasMany(Commodity::class);
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }
}
