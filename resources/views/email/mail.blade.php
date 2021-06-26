@component('mail::message')
# Introduction

The Exception:

Line: {{ $data['line'] }},
File: {{ $data['file'] }},

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent