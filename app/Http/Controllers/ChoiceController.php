<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChoiceStoreRequest;
use App\Http\Requests\UpdateChoiceOrderRequest;
use App\Models\Choice;
use App\Models\Goal;
use App\Models\ResourceLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class ChoiceController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(ChoiceStoreRequest $request): RedirectResponse
    {
        $goal = Goal::where('id', $request->goal_id)->first();

        $content = [];
        foreach ($request->content as $item) {
            $content[] = $item;
        }

        $choice = Choice::create([
            'name' => $request['name'],
            'goal_id' => $request['goal_id'],
            'content' => $content,
        ]);

        $index = array_search('resources', array_column($content, 'type'));

        foreach ($content[$index]['data'] as $resource) {
            foreach ($resource['links'] as $link) {
                $resourceLink = ResourceLink::updateOrCreate(
                    ['link' => $link['link']],
                    ['text' => $link['text'], 'type' => $link['type']]
                );

                $choice->resourceLinks()->attach($resourceLink);
            }
        }

        return redirect()->route('editor.goals.show', [$goal->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Choice $choice): Response|ResponseFactory
    {
        return inertia('Editor/Content/Choices/Show', [
            'choice' => $choice->load('goal'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Choice $choice): Response|ResponseFactory
    {
        return inertia('Editor/Content/Choices/Edit', [
            'choice' => $choice,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Choice $choice): RedirectResponse
    {
        $content = [];
        foreach ($request->content as $item) {
            $content[] = $item;
        }

        $choice->update([
            'name' => $request->name,
            'content' => $content,
        ]);

        return redirect()->back()
            ->with('notification', [
                'actions' => false,
                'message' => 'Updates have been saved',
                'title' => 'Choice saved successfully',
                'type' => 'success',
            ]);
    }

    /**
     * Update the order of choices
     */
    public function updateChoiceOrder(UpdateChoiceOrderRequest $request, Choice $choice): RedirectResponse
    {
        $choice->update([
            'order' => $request['updated_choice']['order'],
        ]);

        Choice::find($request['sibling_choice']['id'])->update([
            'order' => $request['sibling_choice']['order'],
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Choice $choice): RedirectResponse
    {
        $goal = $choice->goal;

        $choice->delete();

        return redirect()->route('editor.goals.show', [$goal->id]);
    }
}
