@component('mail::message')
# Удалена новость: {{ $news->title }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
