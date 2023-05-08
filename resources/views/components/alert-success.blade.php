@props([
    'message'=>''
])
<div
    {{ $attributes->class(['flex p-4  text-sm text-green-800 rounded-lg bg-green-50 ']) }}
    role="alert">
                    <span class="mr-2">
                        <i class="fa-solid fa-check-circle"></i>
                    </span>
    <span class="sr-only">Success</span>
    <div>
        <span class="font-medium">Success</span>
        {{ $message }}
    </div>
</div>
