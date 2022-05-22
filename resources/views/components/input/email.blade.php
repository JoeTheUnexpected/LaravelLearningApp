@props(['id', 'name', 'value', 'error'])
<input id="{{ $id }}"
       type="email"
       name="{{ $name }}"
       class="mt-1 block w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 {{ $error ? 'border-red-600' : 'border-gray-300' }}"
       value="{{ $value }}"
       placeholder="joe@example.com">
