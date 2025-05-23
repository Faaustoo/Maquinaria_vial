<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'start_date',
        'end_date',
        'kilometers',
        'machine_id',
        'project_id',
        'user_id',
    ];

     public function machine()
    {
        return $this->belongsTo(Machine::class, 'machine_id');
    }

     public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
