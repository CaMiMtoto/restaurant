@props([
    'message'=>''
])
<div
    {{ $attributes->class(['flex p-4  text-sm text-green-800 rounded-sm bg-green-50 border border-green-800']) }}
    role="alert">
     <span class="mr-2">
           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
    </svg>
   </span>
    <div>
        {{ $message }}
    </div>
</div>
