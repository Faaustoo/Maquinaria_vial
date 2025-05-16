<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Machine extends Model
{
    use HasFactory; 

    protected $fillable = [
        'serial_number',
        'model',
        'type_id'
    ];

    public function machineType()
    {
        return $this->belongsTo(MachineType::class, 'type_id');
    }

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

}
