<?php

namespace App\Http\Controllers;

use App\Enums\AssignmentStatus;
use App\Http\Requests\AssignmentUpdateRequest;
use App\Models\Assignment;
use App\Models\Goal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:view assignments')->only(['index', 'show']);
        $this->middleware('can:create assignments')->only(['create', 'store', 'edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return inertia('Admin/Assignments/Index', [
            'assignments' => $request->user()->hasRole('admin')
                ? Assignment::with(['assignable', 'user'])->where('status', '!=', AssignmentStatus::COMPLETE)->get()
                : $request->user()->unpublishedEditorAssignments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($assignment = $this->getAssignable($request->assignable_type, $request->assignable_id)->assignment) {
            return redirect()->back()
                ->with('notification', [
                    'actions' => [
                        'view' => ['href' => route('editor.assignments.show', [$assignment->id])],
                    ],
                    'message' => 'An assignment already exists for this content',
                    'title' => 'Assignment error',
                    'type' => 'error',
                ]);
        }

        return inertia('Admin/Assignments/Create', [
            'editors' => $request->user()->editors,
            'assignable' => $this->getAssignable($request->assignable_type, $request->assignable_id),
            'assignableType' => $request->assignable_type,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assignable = $this->getAssignable($request->assignable_type, $request->assignable_id);
        $assignable->assignment()->save(new Assignment([
            'user_id' => $request->user,
        ]));

        return redirect()->route("editor.{$request->assignable_type}s.show", ["{$assignable->slug}"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        return inertia('Editor/Assignments/Show', [
            'assignment' => $assignment->load(['assignable', 'user']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        return inertia('Admin/Assignments/Edit', [
            'currentAssignment' => $assignment->load(['assignable', 'user']),
            'editors' => User::with('roles')->whereHas('roles', function ($q) {
                $q->whereIn('name', ['admin', 'editor']);
            })->orderBy('name', 'desc')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(AssignmentUpdateRequest $request, Assignment $assignment)
    {
        $assignment->update([
            'summary' => $request['summary'],
            'details' => $request['details'],
            'user_id' => $request['user_id'],
        ]);

        return redirect()->route('admin.assignments.index');
    }

    public function markComplete(Assignment $assignment)
    {
        $assignment->update([
            'status' => AssignmentStatus::COMPLETE,
            'completed_at' => Carbon::now(),
        ]);

        return redirect()->back()
            ->with('notification', [
                'actions' => false,
                'message' => 'Assignment marked as complete',
                'title' => 'Assignment updated',
                'type' => 'success',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        //
    }

    public function getAssignable($type, $id)
    {
        switch ($type) {
            case 'goal':
                return Goal::where('id', $id)->first();
        }
    }
}
