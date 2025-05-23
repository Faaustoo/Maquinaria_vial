<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class EndReason extends Model
{
    Use HasFactory;
    
    protected $fillable = [
        'description',
    ];

     public function projects()
    {
        return $this->hasMany(Assignment::class);
    }
}
