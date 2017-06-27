@component('mail::message')
# Introduction

Hi {{ $user->name }},

Thanks for requesting access to CaseMaker. Our team is reviewing your request. Don't worry, we'll get back to you soon.

Once your request has been approved, you will receive an email notification and can begin creating your new case study.

We're excited to see what you have to share.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
