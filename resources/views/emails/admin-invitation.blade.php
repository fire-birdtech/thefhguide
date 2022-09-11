@component('mail::message')
Hi, {{ $name }}

You've been invited to be an {{ $role }} on The Family History Guide. If you already
have an account, you'll just need to accept the invitation. If you don't have
an account yet, you'll be asked to create one before proceeding. Click the link
below to accept your invitation!

@component('mail::button', ['url' => $signedRoute ?? ''])
Accept Invitation
@endcomponent

Thanks,<br>
The Family History Guide
@endcomponent