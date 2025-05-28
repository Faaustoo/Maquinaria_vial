<?php

namespace App\Http\Controllers;

use App\Events\MaintenanceAlert;
use App\Models\Assignment;
use App\Models\Machine;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::with(['machine', 'project'])
            ->whereNull('end_date')
            ->orderBy('id', 'desc') 
            ->paginate(10);
            return view('assignments.index', compact('assignments'));
    }

    public function create()
    {
        $projects = Project::whereNull('end_date')->get();
        $machines = Machine::whereDoesntHave('assignments', function ($query) {
                $query->whereNull('end_date'); 
                })->get();
                return view('assignments.create', compact('machines', 'projects'));
    }

    public function store(Request $request)
    {
        $request->validate(['start_date' => 'required|date','machine_id' => 'required|exists:machines,id','project_id' => 'required|exists:projects,id',]);
        
        $assignment = new Assignment();
        $assignment->start_date = $request->start_date;
        $assignment->machine_id = $request->machine_id;
        $assignment->project_id = $request->project_id;
        $assignment->user_id = Auth::id();
        $assignment->save();
        return redirect()->route('assignments.index')->with('success', 'Asignacion guardada con exito.');
    }

    public function edit($id)
    {
        $assignment = Assignment::findOrFail($id);
        $projects = Project::whereNull('end_date')->get();
        $machines = Machine::whereDoesntHave('assignments', function ($query) {
            $query->whereNull('end_date'); 
            })->get();
        return view('assignments.edit', compact('assignment', 'machines', 'projects'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['machine_id' => 'required|exists:machines,id','project_id' => 'required|exists:projects,id','start_date' => 'required|date','end_date' => 'nullable|date|after_or_equal:start_date',]);

        $assignment = Assignment::findOrFail($id);
        $assignment->machine_id = $request->machine_id;
        $assignment->project_id = $request->project_id;
        $assignment->start_date = $request->start_date;
        $assignment->end_date = $request->end_date;
        $assignment->save();
        return redirect()->route('assignments.index')->with('success', 'Asignacion actualizada con exito.');
    }

    public function destroy($id)
    {
        $assignment = Assignment::findOrFail($id);
        $assignment->delete();
        return redirect()->route('assignments.index')->with('success', 'Asignacion eliminada con exito.');
    }

    public function finishForm($id)
    {
        $assignment = Assignment::with('machine')->findOrFail($id);
        return view('assignments.finishForm', compact('assignment'));
    }

    public function finish(Request $request, $id)
    {
        $request->validate(['end_date' => 'required|date|after_or_equal:start_date','kilometers' => 'required|numeric|min:0',]);

        $assignment = Assignment::findOrFail($id);
        $assignment->end_date = $request->end_date;
        $assignment->kilometers = $request->kilometers;
        $assignment->save();

        $machine = $assignment->machine;
        $machine->kilometers += $request->kilometers;
        $machine->save();

        event(new MaintenanceAlert($machine, $assignment->project_id));

        return redirect()->route('assignments.index')->with('success', 'Asignacion terminada.');
    }

    public function viewFinished()
    {
        $assignments = Assignment::whereNotNull('end_date')
            ->with(['machine', 'project'])
            ->orderBy('id', 'desc')  
            ->paginate(10);
        return view('assignments.finished', compact('assignments'));
    }

}
