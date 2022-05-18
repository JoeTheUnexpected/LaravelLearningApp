@props(['color', 'label'])
<button class="inline-block hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded bg-{{ $color }}">
    {{ $label }}
</button>
