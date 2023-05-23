@props([
    'color'=>'secondary'
])

@if($color=='success')
    @php
        $bgColor='bg-green-100';
        $textColor='text-green-800';
    @endphp
@elseif($color=='danger')
    @php
        $bgColor='bg-red-100';
        $textColor='text-red-800';
    @endphp

@elseif($color=='primary')
    @php
        $bgColor='bg-primary/20';
        $textColor='text-primary';
    @endphp
@elseif($color=='warning')
    @php
        $bgColor='bg-yellow-100';
        $textColor='text-yellow-800';
    @endphp
@elseif($color=='info')
    @php
        $bgColor='bg-blue-100';
        $textColor='text-blue-800';
    @endphp
@else
    @php
        $bgColor='bg-gray-100';
        $textColor='text-gray-800';
    @endphp
@endif


<span {{ $attributes->merge(['class' => "px-2 inline-flex text-xs leading-5 font-semibold rounded-0 $bgColor $textColor"]) }}>
    {{ $slot }}
</span>
