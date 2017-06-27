@component('mail::message')
# Attention!

A new user has requested access to CaseMaker, and is waiting for a response.

Name: {{$registered_user->name}}

Email: {{$registered_user->email}}

Affiliation: {{$registered_user->affiliation}}

Case Study brief: {{$registered_user->introduction}}


@component('mail::button', ['url' => $url ])
Respond to this Request
@endcomponent

To approve or deny this request, or view other pending requests, click the button above or log in to CaseMaker and view the list of Accounts Waiting for Approval.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
