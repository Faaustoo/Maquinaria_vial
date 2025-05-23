<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\EndReason;
use App\Models\Project;
use App\Models\Province;
use App\Models\Machine;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('province')->whereNull('end_date')->paginate(10);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $provinces = Province::all();
        return view('projects.create', compact('provinces'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'province_id' => 'required|exists:provinces,id',
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->province_id = $request->province_id;
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Obra guardada con éxito.');
    }

    public function edit(string $id)
    {
        $provinces = Province::all();
        $project = Project::findOrFail($id);

        return view('projects.edit', compact('provinces', 'project'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'province_id' => 'required|exists:provinces,id',
        ]);

        $project = Project::findOrFail($id);
        $project->name = $request->name;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->province_id = $request->province_id;
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Obra actualizada.');
    }

  

    public function viewFinished()

    {
        $projects = Project::with('province')
            ->whereNotNull('end_date')  
            ->paginate(10);

        return view('projects.finished', compact('projects'));
    }

   public function showFinalizeForm(Project $project)
{
    // Traer máquinas asignadas a esta obra (project)
    $assignments = Assignment::with('machine')
        ->where('project_id', $project->id)
        ->get();

    $endReasons = EndReason::all();

    return view('projects.finalizeForm', compact('project', 'assignments', 'endReasons'));
}

public function finish(Request $request, Project $project)
{
    // Validación de los datos del formulario
    $validated = $request->validate([
        'end_date' => 'required|date',
        'reason_id' => 'required|exists:end_reasons,id',
        'kilometers' => 'required|array',
        'kilometers.*' => 'required|numeric|min:0',
    ]);

            $project->end_date = $validated['end_date'];
            $project->reason_id = $validated['reason_id'];
            $project->save();

    // 2. Actualizar los kilómetros de las máquinas y guardar los kilómetros en la asignación
            foreach ($validated['kilometers'] as $machineId => $km) {
                $machine = Machine::find($machineId);
                if ($machine) {
                    // Sumar kilómetros a la máquina
                    $machine->kilometers += $km;
                    $machine->save();

                    // Guardar kilómetros en la asignación correspondiente
                    $assignment = Assignment::where('project_id', $project->id)
                                            ->where('machine_id', $machineId)
                                            ->latest('created_at')
                                            ->first();

                    if ($assignment) {
                        $assignment->kilometers = $km;
                        $assignment->save();
                    }
        }
    }

    return redirect()->route('projects.index')->with('success', 'Obra finalizada correctamente.');
}


public function showFinishedMachines(Project $project)
{
    // Cargar las máquinas asignadas a la obra (usando la relación assignments y machines)
    $assignments = $project->assignments()->with('machine')->get();

    return view('projects.machine', compact('project', 'assignments'));
}



}
