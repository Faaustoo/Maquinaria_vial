<?php

namespace App\Listeners;

use App\Events\MaintenanceAlert;
use App\Models\Assignment;
use App\Models\Maintenance;
use App\Models\Parameter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendMaintenanceAlert
{
    public function __construct()
    {
        //
    }

    public function handle(MaintenanceAlert $event): void
    {
        $machine = $event->machine;

        $lastMaintenance = $machine->maintenances()
                ->where('type', 'maintenance')
                ->orderBy('date', 'desc')
                ->first();

        if ($lastMaintenance) {
            $maintenanceKm = $lastMaintenance->kilometers;
            } else {
                $maintenanceKm = 0;
            }

        $diferencia = $machine->kilometers - $maintenanceKm;
        $valor = Parameter::first()->value;


        if ($diferencia > $valor) {
        
            $mensaje = "Hola,\n\n La máquina {$machine->serial_number} ha superado los {$valor} km sin mantenimiento.
            \n\nPor favor, lleve la maquina a mantenimento  para evitar problemas.";
            
            Mail::raw($mensaje, function ($mail) use ($machine) { 
            $mail->to($machine->email);
            $mail->subject('Aviso de mantenimiento');
});



            Maintenance::create([
                'date' => now(),
                'kilometers' => $diferencia,
                'description' => "La máquina lleva {$diferencia} km sin mantenimiento.",
                'type' => 'reminder',
                'user_id' => Auth::id(),
                'machine_id' => $machine->id,     
                ]);
        }
    }
}

