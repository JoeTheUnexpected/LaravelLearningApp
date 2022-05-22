<div>
    @guest
        <ul class="flex justify-center sm:justify-end items-center space-x-8 text-sm">
            <li>
                <a class="text-gray-500 hover:text-blue-800" href="{{ route('register') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-blue-800 h-4 w-4"
                         fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Регистрация
                </a>
            </li>
            <li>
                <a class="text-gray-500 hover:text-blue-800" href="{{ route('login') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-blue-800 h-4 w-4"
                         viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                              clip-rule="evenodd"/>
                    </svg>
                    Авторизация
                </a>
            </li>
        </ul>
    @else
        <nav class="flex justify-center sm:justify-end items-center space-x-8 text-sm">
            <a class="text-black hover:text-blue-800" href="{{ route('account') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-blue-800 h-4 w-4" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="inline-block font-bold">{{ auth()->user()->name }}</span>
            </a>
            <a class="text-gray-500 hover:text-blue-800" href="{{ route('account') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-blue-800 h-4 w-4" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                Личный кабинет
            </a>
            <a class="text-gray-500 hover:text-blue-800" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-blue-800 h-4 w-4" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Выйти
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none">
                @csrf
            </form>
        </nav>
    @endguest
</div>
