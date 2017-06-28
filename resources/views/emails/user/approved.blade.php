@component('mail::message')
# Account Approved

Hi {{ $user->name }},

Good news! Your request to access {{ config('app.name') }} has been approved.

To get started, click the button below to login in to {{ config('app.name') }}. Once you are logged in, and click the "Create New Case Study" button.

@component('mail::button', ['url' => $url])
Get started with {{ config('app.name') }}
@endcomponent

If the button doesn't work for you, use this link to log in to your {{ config('app.name') }} account: {{ $url }}.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
