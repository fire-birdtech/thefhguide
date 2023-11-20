<?php

namespace App\Services;

use App\Models\Choice;
use App\Models\Media;

class MediaService
{
    public function attachMediaable(Media $media, int $id, ?string $type = 'choice'): void
    {
        $mediaable = $this->findMediaable($id);

        $media->choices()->save($mediaable);
    }

    public function findMediaable(int $id): Choice
    {
        return Choice::where('id', $id)->first();
    }
}
