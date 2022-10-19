@component('mail::message')
Hi, {{ $name }}

You've been invited to be an {{ $role }} on The Family History Guide. Click the link
below to accept your invitation!

@component('mail::button', ['url' => $signedRoute ?? ''])
Accept Invitation
@endcomponent

Thanks,<br>
The Family History Guide
@endcomponent