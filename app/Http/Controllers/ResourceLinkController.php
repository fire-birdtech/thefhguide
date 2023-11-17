<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResourceLinkRequest;
use App\Models\ResourceLink;
use Illuminate\Http\RedirectResponse;

class ResourceLinkController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function update(ResourceLinkRequest $request): RedirectResponse
    {
        foreach ($request->links as $link) {
            ResourceLink::updateOrCreate(
                ['link' => $link['link']],
                ['text' => $link['text'], 'type' => $link['type']]
            );
        }

        return redirect()->back();
    }
}
