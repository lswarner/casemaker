@component('mail::message')

Hello,

{{ $invitedBy->name }} ({{ $invitedBy->email }}) is working on a case study{!! $title !!} and has invited you to join their team at {{ config('app.name') }}.

To get started, click the button below to create an account or visit http://casemaker.org to learn more.
After your account is created, you'll be able to collaborate on your team's case study, invite colleagues
to participate, or start a new case study of your own.

@component('mail::button', ['url' => $url ])
Create a {{ config('app.name') }} account
@endcomponent

If you don't know {{ $invitedBy->name }} or think you received this email by mistake, you can simply ignore it
or contact us at <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a> if you have any concerns.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
