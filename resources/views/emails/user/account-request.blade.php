@component('mail::message')
# Attention!

A new user has requested access to {{ config('app.name') }}, and is waiting for a response.

Name: {{$registered_user->name}}

Email: {{$registered_user->email}}

Affiliation: {{$registered_user->affiliation}}

Case Study brief: {{$registered_user->introduction}}


@component('mail::button', ['url' => $url ])
Respond to this Request
@endcomponent

To approve or deny this request, or view other pending requests, click the button above or log in to {{ config('app.name') }} and view the list of accounts waiting for approval.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
