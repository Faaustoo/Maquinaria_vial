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
    $projects = Project::with('province')
        ->whereNull('end_date')
        ->orderBy('start_date', 'desc')
        ->paginate(10);

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
        ->orderBy('id', 'desc')   
        ->get();

    return view('projects.finished', compact('projects'));
}


   public function showFinalizeForm(Project $project)
{
    $endReasons = EndReason::all();

    return view('projects.finalizeForm', compact('project', 'endReasons'));
}


public function finish(Request $request, Project $project)
{
    // Verificar que la obra no tenga asignaciones activas
    $hasActiveAssignments = Assignment::where('project_id', $project->id)
        ->whereNull('end_date')
        ->exists();

    if ($hasActiveAssignments) {
        return redirect()->back()->withErrors('No se puede finalizar la obra porque tiene asignaciones activas.');
    }

    // Validar fecha y motivo
    $validated = $request->validate([
        'end_date' => 'required|date|after_or_equal:' . $project->start_date,
        'reason_id' => 'required|exists:end_reasons,id',
    ]);

    // Guardar datos de finalización en el proyecto
    $project->end_date = $validated['end_date'];
    $project->reason_id = $validated['reason_id'];
    $project->save();

    return redirect()->route('projects.index')->with('success', 'Obra finalizada correctamente.');
}



public function showFinishedMachines(Project $project)
{
    // Cargar las máquinas asignadas a la obra (usando la relación assignments y machines)
    $assignments = $project->assignments()->with('machine')->get();

    return view('projects.machine', compact('project', 'assignments'));
}



}
