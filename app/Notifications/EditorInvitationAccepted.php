<?php

namespace App\Notifications;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class EditorInvitationAccepted extends Notification
{
    use Queueable;

    protected Invitation $invitation;
    protected User $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Invitation $invitation, User $user)
    {
        $this->invitation = $invitation;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(mixed $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(mixed $notifiable): array
    {
        return [
            'message' => "{$this->invitation->name} has accepted the invitation to be an {$this->invitation->role}",
            'route' => route('admin.editors.show', ['user' => $this->user->id]),
        ];
    }
}
