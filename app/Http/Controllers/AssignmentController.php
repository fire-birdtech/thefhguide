<?php

namespace App\Http\Controllers;

use App\Enums\AssignmentStatus;
use App\Http\Requests\AssignmentUpdateRequest;
use App\Models\Assignment;
use App\Models\Goal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

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
     */
    public function index(Request $request): Response|ResponseFactory
    {
        return inertia('Admin/Assignments/Index', [
            'assignments' => $request->user()->hasRole('admin')
                ? Assignment::with(['assignable', 'user'])->where('status', '!=', AssignmentStatus::COMPLETE)->get()
                : $request->user()->unpublishedEditorAssignments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): Response|ResponseFactory|RedirectResponse
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
     */
    public function store(Request $request): RedirectResponse
    {
        $assignable = $this->getAssignable($request->assignable_type, $request->assignable_id);
        $assignable->assignment()->save(new Assignment([
            'user_id' => $request->user,
        ]));

        return redirect()->route("editor.{$request->assignable_type}s.show", ["{$assignable->id}"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Assignment $assignment): Response|ResponseFactory
    {
        return inertia('Editor/Assignments/Show', [
            'assignment' => $assignment->load(['assignable', 'user']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assignment $assignment): Response|ResponseFactory
    {
        return inertia('Admin/Assignments/Edit', [
            'assignment' => $assignment->load(['assignable', 'user']),
            'editors' => User::with('roles')->whereHas('roles', function ($q) {
                $q->whereIn('name', ['admin', 'editor']);
            })->orderBy('name', 'desc')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssignmentUpdateRequest $request, Assignment $assignment): RedirectResponse
    {
        $assignment->update([
            'summary' => $request['summary'],
            'details' => $request['details'],
            'user_id' => $request['user_id'],
        ]);

        return redirect()->route('admin.assignments.index');
    }

    public function markComplete(Assignment $assignment): RedirectResponse
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
     */
    public function destroy(Assignment $assignment): void
    {
        //
    }

    public function getAssignable($type, $id): Goal|null
    {
        if ($type == 'goal') {
            return Goal::where('id', $id)->first();
        }

        return null;
    }
}
