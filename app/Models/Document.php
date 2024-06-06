<?php

namespace App\Models;

use App\Models\Section;
use App\Models\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $load = ['sections', 'responses'];

    public function sections(){
        return $this->hasMany(Section::class);
    }

    public function responses(){
        return $this->hasMany(Response::class);
    }
}
