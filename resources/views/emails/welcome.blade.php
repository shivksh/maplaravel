@component('mail::message')
# Introduction

The body of your message.gsdg

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
