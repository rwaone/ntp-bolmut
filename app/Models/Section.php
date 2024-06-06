<?php

namespace App\Models;

use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $load = ['groups'];
    protected $with = ['document'];

    public function groups(){
        return $this->hasMany(Group::class);
    }

    public function section(){
        return $this->belongsTo(Document::class);
    }
}
