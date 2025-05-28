<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\MachineType;
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
        $request->validate(['serial_number' => ['required', 'regex:/^ABC-\d{4}$/', 'unique:machines,serial_number'],'model' => 'required|regex:/^Modelo-\d{3}$/','type_id' => 'required|exists:machine_types,id', 'kilometers' => 'required|integer|min:0',]);

        $machine = new Machine();
        $machine->serial_number = $request->serial_number;
        $machine->model = $request->model;
        $machine->kilometers = $request->kilometers;
        $machine->type_id = $request->type_id;
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
        $request->validate(['serial_number' => 'required|regex:/^ABC-\d{4}$/','model' => 'required|regex:/^Modelo-\d{3}$/','type_id' => 'required|exists:machine_types,id',]);

        $machine = Machine::findOrFail($id);
        $machine->serial_number = $request->serial_number;
        $machine->model = $request->model;
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


                    if ($diferencia > 5000) { 
                        $estado = 'Necesita mantenimiento';
                    } else {
                        $estado = 'Optimo';
                    }
            return view('machines.show', compact('machine', 'ActiveAssignment', 'estado'));
        }



}
