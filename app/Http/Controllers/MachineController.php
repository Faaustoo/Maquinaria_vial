<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\MachineType;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public function index()
    {
        $machines = Machine::with('MachineType')->paginate(10);
        return view('machines.index', compact('machines'));
    }

    public function create()
    {
        $tipos = MachineType::all();
        return view('machines.create', compact('tipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'serial_number' => 'required|regex:/^EXC-\d{4}$/',
            'model' => 'required|regex:/^Modelo-\d{3}$/',
            'type_id' => 'required|exists:machine_types,id',
        ]);

        $machine = new Machine();
        $machine->serial_number = $request->serial_number;
        $machine->model = $request->model;
        $machine->type_id = $request->type_id;
        $machine->save();

        return redirect()->route('machines.index')->with('success', 'Máquina guardada con éxito.');
    }

    public function edit($id)
    {
        $tipos = MachineType::all();
        $machine = Machine::findOrFail($id);

        return view('machines.edit', compact('machine', 'tipos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'serial_number' => 'required|regex:/^EXC-\d{4}$/',
            'model' => 'required|regex:/^Modelo-\d{3}$/',
            'type_id' => 'required|exists:machine_types,id',
        ]);

        $machine = Machine::findOrFail($id);
        $machine->serial_number = $request->serial_number;
        $machine->model = $request->model;
        $machine->type_id = $request->type_id;
        $machine->save();

        return redirect()->route('machines.index')->with('success', 'Máquina actualizada con éxito.');
    }

    public function destroy($id)
    {
        $machine = Machine::findOrFail($id);
        $machine->delete();

        return redirect()->route('machines.index')->with('success', 'Máquina eliminada con éxito.');
    }
}
