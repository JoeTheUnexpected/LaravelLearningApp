@props(['label', 'value'])
@if($value)
    <tr>
        <td class="py-2 text-gray-600 w-1/2">{{ $label }}:</td>
        <td class="py-2 text-black font-bold w-1/2">{{ $value }}</td>
    </tr>
@endif
