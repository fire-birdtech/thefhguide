<?php

namespace App\Services;

use App\Exceptions\MediaAttachmentAlreadyExistsException;
use App\Models\Choice;
use App\Models\Media;
use Illuminate\Database\Eloquent\Builder;

class MediaService
{
    /**
     * @throws MediaAttachmentAlreadyExistsException
     */
    public function attachMediaable(Media $media, int $id, ?string $type = 'choice'): void
    {
        $attachmentExists = $media->where('id', $media->id)->whereHas('choices', function (Builder $query) use ($id) {
            $query->where('mediaable_id', $id);
        })->exists();

        if ($attachmentExists) {
            throw new MediaAttachmentAlreadyExistsException('Media is already attached');
        }

        $mediaable = $this->findMediaable($id);

        $media->choices()->save($mediaable);
    }

    public function findMediaable(int $id): Choice
    {
        return Choice::where('id', $id)->first();
    }
}
