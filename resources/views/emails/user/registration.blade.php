@component('mail::message')

Hi {{ $user->name }},

Thanks for requesting access to {{ config('app.name') }}. Our team is reviewing your request. Don't worry, we'll get back to you soon.

Once your request has been approved, you will receive an email notification and can begin creating your new case study.

We're excited to see what you have to share.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
