<div class="">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reservations') }}
        </h2>
    </x-slot>
    {{--  Coomming soon feature--}}

    <div class="my-10">
        {{--        Oops--}}

        <div class="bg-red-100 px-4 py-6 border-l-4 border-l-red-600">
            <h1 class="text-4xl text-red-600 font-semibold mb-4">
                Oops !!
            </h1>
            <p class="text-xl mb-6">
                This feature is not yet implemented in this version of the app but will be available in the next
                version.
            </p>

            <a href="{{ route('dashboard') }}"
               class="text-xl text-white py-2 px-4 bg-red-700 mt-10 d-block hover:bg-opacity-80">
                Go back to dashboard
            </a>

        </div>

    </div>

</div>
