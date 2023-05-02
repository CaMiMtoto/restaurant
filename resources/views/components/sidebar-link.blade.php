@props([
    'active' => false,
    'href' => '#',
    'icon' => null,
    'title' => null,
])

<li {{ $attributes }}>
    <a href="{{ $href }}"
       class="text-gray-700 text-base  items-center w-full inline-flex font-semibold p-2 rounded-sm {{ $active?'text-white bg-primary':'' }}">
        @if ($icon)
            <i class="fa-solid fa-{{ $icon }}"></i>
        @endif
        {{ $slot }}
        <span class="ml-2">
            {{ $title }}
        </span>
    </a>
</li>
