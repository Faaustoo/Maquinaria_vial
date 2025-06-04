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
        $request->validate([ 'name' => ['required', 'regex:/^[a-zA-Z0-9 ]+$/', 'max:100'],
                            'start_date'=>'required|date',
                            'end_date'=>'nullable|date',
                            'province_id'=>'required|exists:provinces,id',
                            ],[
                            'name.required' => 'El nombre es obligatorio.',
                            'name.regex' => 'El nombre solo puede contener letras, números y espacios.',
                            'name.max' => 'El nombre no puede tener más de 100 caracteres.',
                            'start_date.required'=>'La fecha de inicio es obligatoria.',
                            'start_date.date'=>'La fecha de inicio debe tener un formato válido.',
                            'province_id.required'=>'La provincia es obligatoria.',
                            ]);

        $project = new Project();
        $project->name = $request->name;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->province_id = $request->province_id;
        $project->save();
        return redirect()->route('projects.index')->with('success', 'Obra guardada con exito.');
    }

    public function edit($id)
    {
        $provinces = Province::all();
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('provinces', 'project'));
    }

    public function update(Request $request,$id)
    {
        $request->validate(['name' => ['required', 'regex:/^[a-zA-Z0-9 ]+$/', 'max:100'],
                            'start_date' => 'required|date',
                            'end_date' => 'nullable|date',
                            'province_id' => 'required|exists:provinces,id',
                            ], [
                            'name.required' => 'El nombre es obligatorio.',
                            'name.regex' => 'El nombre solo puede contener letras, números y espacios.',
                            'name.max' => 'El nombre no puede tener más de 100 caracteres.',
                            'start_date.required' => 'La fecha de inicio es obligatoria.',
                            'start_date.date' => 'La fecha de inicio debe ser una fecha válida.',
                            'province_id.required' => 'La provincia es obligatoria.',
                            ]);


        $project = Project::findOrFail($id);
        $project->name = $request->name;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->province_id = $request->province_id;
        $project->save();
        return redirect()->route('projects.index')->with('success', 'Obra actualizada con exito.');
    }

    public function viewFinished()
    {
        $projects = Project::with('province')
            ->whereNotNull('end_date')
            ->orderBy('id', 'desc')   
            ->get();
            return view('projects.finished', compact('projects'));
    }

    public function showFinalizeForm($id)
    {
        $project = Project::findOrFail($id);
        $endReasons = EndReason::all();
        return view('projects.finalizeForm', compact('project', 'endReasons'));
    }

public function finish(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $activeAssignments = Assignment::where('project_id', $project->id)
            ->whereNull('end_date')
            ->exists();
                if ($activeAssignments) {
                    return redirect()->back()->withErrors('Error la obra porque tiene asignaciones activas.');
                }

        $request->validate(['end_date'  => 'required|date|after_or_equal:start_date',
                            'reason_id' => 'required|exists:end_reasons,id',
                            ],[
                            'end_date.required' => 'La fecha de finalización es obligatoria.',
                            'end_date.date'=> 'La fecha de finalización debe ser una fecha válida.',
                            'end_date.after_or_equal'=> 'La fecha de finalización debe ser igual o posterior a la fecha de inicio.',
                            'reason_id.required'=> 'La razón es obligatoria.',
                            ]);


        $project->end_date = $request->end_date;
        $project->reason_id = $request->reason_id;
        $project->save();
        return redirect()->route('projects.index')->with('success', 'Obra finalizada con exito.');
    }


public function showFinishedMachines($id)
    {
        $project = Project::findOrFail($id);
        $assignments = $project->assignments()->with('machine')->get();
        return view('projects.machine', compact('project', 'assignments'));
    }
}
