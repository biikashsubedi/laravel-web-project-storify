@component('mail::message')
# Successfully Added!

Your title is: {{$title}}.

@component('mail::button', ['url' => ''])
Click to Review
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
