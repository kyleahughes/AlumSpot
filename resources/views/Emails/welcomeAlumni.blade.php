@component('mail::messageAlum')
# Welcome to AlumSpot, {{ $alumni->first_name }} {{ $alumni->last_name }}

You have registered as an alumnus for {{ $alumni->program->school }} {{ $alumni->program->type }} {{ $alumni->program->sport }}.
In order to get started and tour the features that are now available to you, please click below.

@component('mail::button', ['url' => 'http://alumspot.localhost/features'])
View Features
@endcomponent

Thanks!<br>
©AlumSpot
@endcomponent
