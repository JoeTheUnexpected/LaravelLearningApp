<header class="bg-white">
    <div class="border-b">
        <div
            class="container mx-auto block sm:flex sm:justify-between sm:items-center py-4 px-4 sm:px-0 space-y-4 sm:space-y-0">
            <div class="flex justify-center">
                @if(request()->routeIs('home'))
                    <span class="inline-block sm:inline">
                        <img src="/images/logo.svg" width="222" height="30" alt="">
                    </span>
                @else
                    <a href="{{ route('home') }}" class="inline-block sm:inline hover:opacity-75">
                        <img src="/images/logo.svg" width="222" height="30" alt="">
                    </a>
                @endif
            </div>

            <x-panels.auth />
        </div>
    </div>

    <x-panels.categories />

</header>
