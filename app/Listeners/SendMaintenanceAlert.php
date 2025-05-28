<?php

namespace App\Listeners;

use App\Events\MaintenanceAlert;
use App\Models\Assignment;
use App\Models\Maintenance;
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

        if ($diferencia > 5000) {
            $mensaje = "Hola,\n\n La máquina {$machine->serial_number} ha superado los 5,000 km sin mantenimiento.
            \n\nPor favor, lleve la maquina a mantenimento  para evitar problemas.";
            
            Mail::raw($mensaje, function ($mail) { 
                $mail->to('fausto.parada12@gmail.com');
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

