@component('mail::message')
# Welcome to Kufa. You can contribute now

I would like to thank you for becoming a user. Please Login With Your Information

{{-- Your Email: {{ $get_user->email }} --}}
Your Password: 1234567890

@component('mail::button', ['url' => 'http://127.0.0.1:8000/admin'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
