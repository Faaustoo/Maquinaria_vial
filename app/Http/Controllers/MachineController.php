<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Machine;
use App\Models\MachineType;
use App\Models\Parameter;
use App\Models\Status;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public function index()
    {
        $machines = Machine::with('machineType')->paginate(10);
        return view('machines.index', compact('machines'));
    }

    public function create()
    {
        $tipos = MachineType::all();
        return view('machines.create', compact('tipos'));
    }

    public function store(Request $request)
    {
        $libreStatus = Status::where('status', 'libre')->first();
        $request->validate(['serial_number'=>['required','regex:/^ABC-\d{4}$/','max:8','unique:machines,serial_number'],
                            'model'=>['required','regex:/^Modelo-\d{3}$/','max:10'],
                            'type_id'=>['required','exists:machine_types,id'],
                            'kilometers'=>['required','integer','min:0'],
                            'email'=>['required','email','max:100'],
                        ],[
                            'serial_number.required'=>'El número de serie es obligatorio.',
                            'serial_number.regex'=>'El número de serie debe tener el formato ABC-1234.',
                            'serial_number.max'=>'El número de serie no puede tener más de 8 caracteres.',
                            'serial_number.unique'=>'El número de serie ya existe.',
                            'model.required'=>'El modelo es obligatorio.',
                            'model.regex'=>'El modelo debe tener el formato Modelo-123.',
                            'model.max' =>'El modelo no puede tener más de 10 caracteres.',
                            'type_id.required'=>'El tipo es obligatorio.',
                            'kilometers.required'=>'Los kilómetros son obligatorios.',
                            'kilometers.integer'=>'Los kilómetros deben ser un número entero.',
                            'kilometers.min'=>'Los kilómetros no pueden ser negativos.',
                            'email.required'=>'El correo electrónico es obligatorio.',
                            'email.email'=>'El correo debe ser una dirección válida.',
                            'email.max' =>'El correo no puede tener más de 100 caracteres.',
                        ]);


        $machine = new Machine();
        $machine->serial_number = $request->serial_number;
        $machine->model = $request->model;
        $machine->kilometers = $request->kilometers;
        $machine->email = $request->email;
        $machine->type_id = $request->type_id;
        $machine->status_id = $libreStatus->id;
        $machine->save();
        return redirect()->route('machines.index')->with('success', 'Maquina guardada con exito.');
    }

    public function edit($id)
    {
        $tipos = MachineType::all();
        $machine = Machine::findOrFail($id);
        return view('machines.edit', compact('machine', 'tipos'));
    }

    public function update(Request $request, $id)
    {
       $request->validate(['serial_number' => 'required|regex:/^ABC-\d{4}$/|max:8|unique:machines,serial_number,' . $id,
                            'model' => 'required|regex:/^Modelo-\d{3}$/|max:10',
                            'email' => 'required|email|max:100',
                            'type_id' => 'required|exists:machine_types,id',
                        ], [
                            'serial_number.required' => 'El número de serie es obligatorio.',
                            'serial_number.regex' => 'El número de serie debe tener el formato ABC-1234.',
                            'serial_number.max' => 'El número de serie no puede tener más de 8 caracteres.',
                            'serial_number.unique' => 'El número de serie ya existe.',
                            'model.required' => 'El modelo es obligatorio.',
                            'model.regex' => 'El modelo debe tener el formato Modelo-123.',
                            'model.max' => 'El modelo no puede tener más de 10 caracteres.',
                            'email.required' => 'El correo electrónico es obligatorio.',
                            'email.email' => 'El correo debe ser una dirección válida.',
                            'email.max' => 'El correo no puede tener más de 100 caracteres.',
                            'type_id.required' => 'El tipo es obligatorio.',
                        ]);



        $machine = Machine::findOrFail($id);
        $machine->serial_number = $request->serial_number;
        $machine->model = $request->model;
        $machine->email = $request->email;
        $machine->type_id = $request->type_id;
        $machine->save();
        return redirect()->route('machines.index')->with('success', 'Maquina actualizada con exito');
    }

    public function destroy($id)
    {
        $machine = Machine::findOrFail($id);
        $machine->delete();
        return redirect()->route('machines.index')->with('success', 'Maquina eliminada con exito.');
    }

    public function show($id)
        {
            $machine = Machine::with(['maintenances'])->findOrFail($id);
            
            $ActiveAssignment = $machine->assignments()
                ->whereNull('end_date')
                ->first();
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
                        $estado = 'Necesita mantenimiento';
                    } else {
                        $estado = 'Optimo';
                    }
            return view('machines.show', compact('machine', 'ActiveAssignment', 'estado'));
        }

    public function location()
        {
            $assignments = Assignment::with(['machine', 'project.province'])
                            ->whereNull('end_date') 
                            ->get();
            return view('machines.map', compact('assignments'));
        }
}
