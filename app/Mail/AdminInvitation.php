<?php

namespace App\Mail;

use App\Models\Invitation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class AdminInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $invitation;

    public $signedRoute;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Invitation $invitation)
    {
        $this->invitation = $invitation;
        $this->signedRoute = URL::temporarySignedRoute(
            'invitations.accept',
            now()->addHours(24),
            ['invitation' => $this->invitation->id]
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@thefhguide.com')
            ->markdown('emails.admin-invitation', [
                'name' => $this->invitation->name,
                'role' => $this->invitation->role,
                'signedRoute' => $this->signedRoute,
            ]);
    }
}
