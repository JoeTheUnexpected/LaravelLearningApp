@props(['tags'])
@if($tags->isNotEmpty())
    <div>
        @foreach($tags as $tag)
            <span class="text-sm text-white italic rounded bg-blue-800 px-2">{{ $tag->name }}</span>
        @endforeach
    </div>
@endif
