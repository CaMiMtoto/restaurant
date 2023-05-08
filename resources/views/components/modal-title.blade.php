@props([
    'title' => 'Modal Title'
])
<div {{ $attributes->class(['flex justify-between items-center']) }}>
    <h1 class="text-xl font-bold text-gray-900 ">
        {{ $title }}
    </h1>
    <button x-on:click="$dispatch('close')" type="button" class="text-gray-700 hover:text-gray-900">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
</div>
