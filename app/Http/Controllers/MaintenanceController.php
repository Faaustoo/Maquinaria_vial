<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\Machine;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller{

   public function index()
{
    $maintenances = Maintenance::with(['machine', 'user'])->paginate(10);
    $machines = Machine::all();  // Trae todas las máquinas

    return view('maintenances.index', compact('maintenances', 'machines'));
}

    public function create()
    {
        $machines = Machine::all();
        return view('maintenances.create', compact('machines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'kilometers' => 'required|integer',
            'description' => 'required|string',
            'machine_id' => 'required|exists:machines,id',
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
        $request->validate([
            'date' => 'required|date',
            'kilometers' => 'required|integer',
            'description' => 'required|string',
            'machine_id' => 'required|exists:machines,id',
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

    public function show($machine_id)
{
    $machine = Machine::with('maintenances')->findOrFail($machine_id);
    return view('maintenances.show', compact('machine'));
}


}