<div>
    @if(session()->has('success'))
        <x-alert-success :message="session('success')"/>
    @endif

    @if(session()->has('error'))
        <x-alert-danger :message="session('error')"/>
    @endif

    @if(session()->has('warning'))
        <x-alert-warning :message="session('warning')"/>
    @endif

    @if(session()->has('info'))
        <x-alert-info :message="session('info')"/>
    @endif

    @if(session()->has('status'))
        <div class="flex p-4 mb-4 text-sm text-gray-800 rounded-md bg-gray-50"
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

