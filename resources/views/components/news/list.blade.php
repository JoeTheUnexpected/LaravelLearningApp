@props(['news'])
@if($news->isNotEmpty())
    <div class="space-y-4 mt-4">
        @foreach($news as $item)
            <x-news.item :item="$item" />
        @endforeach
    </div>
@endif