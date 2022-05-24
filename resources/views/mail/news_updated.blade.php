@component('mail::message')
# Обновлена новость: {{ $news->title }}

{!! $news->body !!}

@component('mail::button', ['url' => route('news.show', $news->getRouteKey())])
Посмотреть новость
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
