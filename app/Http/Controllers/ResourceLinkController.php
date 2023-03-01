<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResourceLinkRequest;
use App\Models\ResourceLink;

class ResourceLinkController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ResourceLinkRequest $request)
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
