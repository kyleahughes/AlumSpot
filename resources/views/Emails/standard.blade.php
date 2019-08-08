@component('mail::message')
# {{ $user->program->type }} {{ $user->program->sport }} Community,

{{ $email->body }}

Thanks!<br>
{{ $user->first_name }} {{ $user->last_name }}
@endcomponent
