<?php

namespace App\Notifications;

use App\Models\Invitation;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class EditorInvitationAccepted extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Invitation $invitation)
    {
        $this->invitation = $invitation;
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
            'messsage' => "{$this->invitation->name} has accepted the invitation to be an {$this->invitation->role}",
            'notification' => $this->id
        ];
    }
}
