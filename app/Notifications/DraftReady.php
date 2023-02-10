<?php

namespace App\Notifications;

use App\Models\Draft;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class DraftReady extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Draft $draft)
    {
        $this->draft = $draft;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => "Updates by {$this->draft->user->name} are ready to publish for {$this->draft->draftable->name}",
            'route' => route('editor.drafts.edit', ['draft' => $this->draft->id]),
        ];
    }
}
