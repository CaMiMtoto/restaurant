@props([
    'message'=>''
])
<div {{ $attributes->class(['flex p-4 text-sm text-blue-800 rounded-lg bg-blue-50']) }}
     role="alert">
                    <span class="mr-2">
                        <i class="fa-solid fa-info-circle"></i>
                    </span>
    <span class="sr-only">Info</span>
    <div>
        <span class="font-medium">Info</span> {{ $message }}
    </div>
</div>
