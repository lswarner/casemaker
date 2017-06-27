@component('mail::message')
# Introduction

Hi {{ $user->name }},

Good news! Your request to access CaseMaker has been approved.

To get started, click the button below to login in to CaseMaker. Once you are logged in, and click the "Create New CaseStudy" button.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

If the button doesn't work for you, use this link to log in to your CaseMaker account: {{ url('auth/login')}}.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
