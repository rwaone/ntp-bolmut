<?php

namespace App\Models;

use App\Models\Kecamatan;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kabupaten extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $load = ['kecamatan'];

    public function kecamatan(){
        return $this->hasMany(Kecamatan::class);
    }
}
