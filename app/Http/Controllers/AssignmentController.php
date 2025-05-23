<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Machine;
use App\Models\Project;
use App\Models\EndReason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::with(['machine', 'projects', 'endReason'])->paginate(10);
        return view('assignments.index', compact('assignments'));
    }

    public function create()
    {
        $machines = Machine::all();
        $projects = Project::all();
        $endReasons = EndReason::all();

        return view('assignments.create', compact('machines', 'projects', 'endReasons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'machine_id' => 'required|exists:machines,id',
            'project_id' => 'required|exists:projects,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'reason_id' => 'nullable|exists:end_reasons,id',
        ]);

        $assignment = new Assignment();
$assignment->machine_id = $request->machine_id;
$assignment->project_id = $request->project_id;
$assignment->start_date = $request->start_date;
$assignment->end_date = $request->end_date;
$assignment->reason_id = $request->reason_id;
$assignment->user_id = Auth::id();

$assignment->save();


        return redirect()->route('assignments.index')->with('success', 'Asignación guardada con éxito.');
    }

    public function edit($id)
    {
        $assignment = Assignment::findOrFail($id);
        $machines = Machine::all();
        $projects = Project::all();
        $endReasons = EndReason::all();

        return view('assignments.edit', compact('assignment', 'machines', 'projects', 'endReasons'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'machine_id' => 'required|exists:machines,id',
            'project_id' => 'required|exists:projects,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'end_reason_id' => 'nullable|exists:end_reasons,id',
        ]);

        $assignment = Assignment::findOrFail($id);
        $assignment->machine_id = $request->machine_id;
        $assignment->project_id = $request->project_id;
        $assignment->start_date = $request->start_date;
        $assignment->end_date = $request->end_date;
        $assignment->end_reason_id = $request->end_reason_id;
        $assignment->save();

        return redirect()->route('assignments.index')->with('success', 'Asignación actualizada con éxito.');
    }

    public function destroy($id)
    {
        $assignment = Assignment::findOrFail($id);
        $assignment->delete();

        return redirect()->route('assignments.index')->with('success', 'Asignación eliminada con éxito.');
    }


}
