<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class MachineType extends Model
{
    use HasFactory; 

    protected $fillable = [
        'name',
    ];

    public function machines()
    {
        return $this->hasMany(Machine::class);
    }
}
