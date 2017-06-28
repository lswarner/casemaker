@component('mail::message')
#Account Denied

Hello {{ $user->name }},

Unfortuantely, your request to access {{ config('app.name') }} has been denied at this time. If you believe this is a mistake, please communicate with your contact at URC for more information.

Thank you,<br>
{{ config('app.name') }}
@endcomponent
