<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\Machine;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller{

public function index()
    {
        $machines = Machine::all();
        $maintenances = Maintenance::with(['machine', 'user'])
            ->where('type', 'maintenance')  
            ->orderBy('date', 'desc')
            ->paginate(10);

        return view('maintenances.index', compact('maintenances', 'machines'));
    }


    public function create()
    {
        $machines = Machine::all();
        return view('maintenances.create', compact('machines'));
    }

    public function store(Request $request)
    {
        $request->validate(['date'=>'required|date',
                            'kilometers'=>'required|integer',
                            'description'=>'required|string|max:255',
                            'machine_id'=>'required|exists:machines,id',
                        ],[
                            'date.required'=>'La fecha es obligatoria.',
                            'date.date'=>'La fecha debe tener un formato válido.',
                            'kilometers.required'=>'Los kilómetros son obligatorios.',
                            'kilometers.integer'=>'Los kilómetros deben ser un número entero.',
                            'description.required'=>'La descripción es obligatoria.',
                            'description.string'=>'La descripción debe ser texto.',
                            'description.max'=>'La descripción no puede tener más de 255 caracteres.',
                            'machine_id.required'=>'La máquina es obligatoria.',
                        ]);



        $maintenance = new Maintenance();
        $maintenance->date = $request->date;
        $maintenance->kilometers = $request->kilometers;
        $maintenance->description = $request->description;
        $maintenance->machine_id = $request->machine_id;
        $maintenance->user_id = Auth::id(); 
        $maintenance->save();
        return redirect()->route('maintenances.index')->with('success', 'Mantenimiento registrado.');
    }

    public function edit($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $machines = Machine::all();
        return view('maintenances.edit', compact('maintenance', 'machines'));
    }

    public function update(Request $request, $id)
    {
    $request->validate(['date'=>'required|date',
                        'kilometers'=>'required|integer',
                        'description'=>'required|string|max:255',
                        'machine_id'=>'required|exists:machines,id',
                        ],[
                        'date.required'=>'La fecha es obligatoria.',
                        'date.date'=>'La fecha debe tener un formato válido.',
                        'kilometers.required'=>'Los kilómetros son obligatorios.',
                        'kilometers.integer'=>'Los kilómetros deben ser un número entero.',
                        'description.required'=>'La descripción es obligatoria.',
                        'description.string'=>'La descripción debe ser texto.',
                        'description.max'=>'La descripción no puede tener más de 255 caracteres.',
                        'machine_id.required'=>'La máquina es obligatoria.',
                        ]);


        $maintenance = Maintenance::findOrFail($id);
        $maintenance->update([
            'date' => $request->date,
            'kilometers' => $request->kilometers,
            'description' => $request->description,
            'machine_id' => $request->machine_id,
        ]);
        return redirect()->route('maintenances.index')->with('success', 'Mantenimiento actualizado.');
    }

    public function show(Request $request)
    {
        $id = $request->input('machine_id');
        $machine = Machine::findOrFail($id);
        $maintenances = $machine->maintenances()
            ->where('type', 'maintenance')
            ->orderBy('date', 'desc')
            ->get();
        return view('maintenances.show', compact('machine', 'maintenances'));
    }

    public function reminders()
    {
        $machines = Machine::all();
        $maintenances = Maintenance::with(['machine', 'user'])
            ->where('type', 'reminder')  
            ->orderBy('date', 'desc')
            ->paginate(10);
        return view('maintenances.reminders', compact('maintenances', 'machines'));
    }

    public function destroy($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->delete();
        return redirect()->back()->with('success', 'Recordatorio eliminado correctamente.');
    }
}