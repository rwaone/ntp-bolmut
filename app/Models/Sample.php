<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $with = ['document'];
    
    public function document(){
        return $this->belongsTo(Document::class);
    }
}
