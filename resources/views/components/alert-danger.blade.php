@props([
    'message'=>''
])

<div {{ $attributes->class(['flex p-4 text-sm text-red-800 rounded-md bg-red-50']) }}
     role="alert">
                    <span class="mr-2">
                        <i class="fa-solid fa-exclamation-circle"></i>
                    </span>
    <span class="sr-only">Error</span>
    <div>
        <span class="font-medium">Error</span> {{ $message }}
    </div>
</div>
