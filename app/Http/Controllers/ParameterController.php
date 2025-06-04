<?php

namespace App\Http\Controllers;

use App\Events\MaintenanceAlert;
use App\Models\Machine;
use App\Models\Parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ParameterController extends Controller
{

    public function edit()
        {
            $parameter = Parameter::first();
            return view('parameters.edit', compact('parameter'));
        }

    public function update(Request $request)
        {
        $request->validate(['value' => 'required|integer|min:1|max:1000000'
                        ], [
                            'value.required' => 'El valor es obligatorio.',
                            'value.integer' => 'El valor debe ser un número entero.',
                            'value.min' => 'El valor debe ser mayor a 0.',
                            'value.max' => 'El valor no puede superar 1.000.000 km.',
                        ]);


            $parameter = Parameter::first();
                $parameter->update([
                    'value' => $request->value,
                ]);

            $machines = Machine::all();

            foreach ($machines as $machine) {
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

            if ($diferencia > $parameter->value) {
                event(new MaintenanceAlert($machine)); 
            }
}


            return redirect()->route('parameters.edit')->with('success', 'Parámetro actualizado.');
        }

}
