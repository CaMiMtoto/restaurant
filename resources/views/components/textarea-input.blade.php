@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-sm text-gray-900 border border-gray-300 rounded-md w-80 bg-gray-50 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 focus:border-gray-300']) !!}></textarea>
