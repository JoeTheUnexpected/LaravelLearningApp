@props(['id', 'name', 'error'])
<input id="{{ $id }}"
       type="password"
       name="{{ $name }}"
       class="mt-1 block w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 {{ $error ? 'border-red-600' : 'border-gray-300' }}">
