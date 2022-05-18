@props(['name', 'label', 'checked'])
<div class="block">
    <div class="mt-2">
        <div>
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox"
                       name="{{ $name }}"
                       class="rounded border-gray-300 text-blue-800 shadow-sm focus:border-blue-300 focus:ring focus:ring-offset-0 focus:ring-blue-200 focus:ring-opacity-50"
                       {{ $checked  }}>
                <span class="ml-2">{{ $label }}</span>
            </label>
        </div>
    </div>
</div>
