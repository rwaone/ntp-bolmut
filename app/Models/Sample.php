<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;
    use HasUuids;
    protected $guarded = ['id'];
    protected $with = ['document'];
    
    public function document(){
        return $this->belongsTo(Document::class);
    }
    // protected $fillable = ['respondent_name','desa_id','document_id'];
}
