@component('mail::message')
# Welcome to AlumSpot, Coach {{ $user->last_name }}

You have registered as the head coach for {{ $user->program->school }} {{ $user->program->type }} {{ $user->program->sport }} .
In order to get started and tour the features that are now available to you, please click below.

@component('mail::button', ['url' => 'http://alumspot.localhost/features'])
View Features
@endcomponent

Thanks!<br>
©AlumSpot
@endcomponent