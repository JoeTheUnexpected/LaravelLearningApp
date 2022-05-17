<div class="mt-8 border-t sm:border-t-0 sm:mt-0 sm:border-l py-2 sm:pl-4 sm:pr-8">
    <p class="text-3xl text-black font-bold mb-4">Информация</p>
    <nav>
        <ul class="list-none">
            <li>
                @if (request()->routeIs('about'))
                    <span class="text-blue-800 cursor-pointer">О компании</span>
                @else
                    <a class="text-gray-600 hover:text-blue-800" href="{{ route('about') }}">О компании</a>
                @endif
            </li>
            <li>
                @if (request()->routeIs('contact'))
                    <span class="text-blue-800 cursor-pointer">Контактная информация</span>
                @else
                    <a class="text-gray-600 hover:text-blue-800" href="{{ route('contact') }}">Контактная информация</a>
                @endif
            </li>
            <li>
                @if (request()->routeIs('sales'))
                    <span class="text-blue-800 cursor-pointer">Условия продаж</span>
                @else
                    <a class="text-gray-600 hover:text-blue-800" href="{{ route('sales') }}">Условия продаж</a>
                @endif
            </li>
            <li>
                @if (request()->routeIs('financial'))
                    <span class="text-blue-800 cursor-pointer">Финансовый отдел</span>
                @else
                    <a class="text-gray-600 hover:text-blue-800" href="{{ route('financial') }}">Финансовый отдел</a>
                @endif
            </li>
            <li>
                @if (request()->routeIs('clients'))
                    <span class="text-blue-800 cursor-pointer">Для клиентов</span>
                @else
                    <a class="text-gray-600 hover:text-blue-800" href="{{ route('clients') }}">Для клиентов</a>
                @endif
            </li>
        </ul>
    </nav>
</div>