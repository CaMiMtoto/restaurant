<div class="my-4">
    @if(session()->has('success'))
        <div class="flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 "
             role="alert">
                    <span class="mr-2">
                        <i class="fa-solid fa-check-circle"></i>
                    </span>
            <span class="sr-only">Success</span>
            <div>
                <span class="font-medium">Success</span> {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session()->has('error'))
        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50"
             role="alert">
                    <span class="mr-2">
                        <i class="fa-solid fa-exclamation-circle"></i>
                    </span>
            <span class="sr-only">Error</span>
            <div>
                <span class="font-medium">Error</span> {{ session('error') }}
            </div>
        </div>
    @endif

    @if(session()->has('warning'))
        <div class="flex p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50"
             role="alert">
                    <span class="mr-2">
                        <i class="fa-solid fa-exclamation-triangle"></i>
                    </span>
            <span class="sr-only">Warning</span>
            <div>
                <span class="font-medium">Warning</span> {{ session('warning') }}
            </div>
        </div>
    @endif

    @if(session()->has('info'))
        <div class="flex p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50"
             role="alert">
                    <span class="mr-2">
                        <i class="fa-solid fa-info-circle"></i>
                    </span>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Info</span> {{ session('info') }}
            </div>
        </div>
    @endif

    @if(session()->has('status'))
        <div class="flex p-4 mb-4 text-sm text-gray-800 rounded-lg bg-gray-50"
             role="alert">
                    <span class="mr-2">
                        <i class="fa-solid fa-info-circle"></i>
                    </span>
            <span class="sr-only">Status</span>
            <div>
                <span class="font-medium">Status</span> {{ session('status') }}
            </div>
        </div>
    @endif

</div>

