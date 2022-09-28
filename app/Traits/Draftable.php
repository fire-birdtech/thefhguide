<?php

namespace App\Traits;

use App\Models\Draft;

trait Draftable
{
    public function createDraft($user, $assignment)
    {
        $this->draft()->save(new Draft([
            'user_id' => $user,
            'assignment_id' => $assignment,
            'slug' => $this->slug,
            'old_name' => $this->name,
            'new_name' => $this->name,
            'old_summary' => $this->summary,
            'new_summary' => $this->summary,
            'old_instructions' => $this->instructions,
            'new_instructions' => $this->instructions,
            'old_resources' => $this->resources,
            'new_resources' => $this->resources,
            'old_review' => $this->review,
            'new_review' => $this->review,
            'old_exercises' => $this->exercises,
            'new_exercises' => $this->exercises
        ]));

        return $this->draft;
    }
}