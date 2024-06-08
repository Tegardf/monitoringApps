@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-200 focus:border-gray-400 focus:ring-gray-400 rounded-md shadow-sm']) !!}>
