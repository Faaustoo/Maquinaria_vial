<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    Use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'province_id',
        'reason_id'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

     public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

     public function endReason()
    {
        return $this->belongsTo(EndReason::class, 'reason_id');
    }

    

}