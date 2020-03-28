@component('mail::message')
# You were invited by {{ $name }} to shop with them online. 

Please first confirm with them, then view the invitation by clicking the button below. <br>
Note: use the same email to create your account.

@component('mail::button', ['url' => $url])
View Invitation
@endcomponent

Cheers,<br>
{{ config('app.name') }} Team
@endcomponent
