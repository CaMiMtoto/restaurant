@props([
    'message'=>''
])

<div {{ $attributes->class(['flex p-4  text-sm text-yellow-800 rounded-lg bg-yellow-50']) }}
     role="alert">
                    <span class="mr-2">
                        <i class="fa-solid fa-exclamation-triangle"></i>
                    </span>
    <span class="sr-only">Warning</span>
    <div>
        <span class="font-medium">Warning</span> {{ $message }}
    </div>
</div>
