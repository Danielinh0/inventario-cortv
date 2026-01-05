<!-- Agrega este bloque ANTES de la etiqueta <nav> -->
<div class="h-2 py-2 w-full flex justify-center  border-b border-gray-100">
    <div class="w-full h-4 bg-repeat-x" style="background-image: url('https://www.oaxaca.gob.mx/cortv/wp-content/themes/temadeps2023/assets/images/greca.png'); background-size: auto 100%;"></div>
</div>
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-30">
            <div class="flex">
                <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo  />
                        </a>
                    </div>
                @auth
                    <!-- Navigation Links -->
                    <!--Dashboard-->
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link class="text-gray-600" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                        </div>
                    <!--Reportes-->
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link class="text-gray-600" :href="route('reportes')" :active="request()->routeIs('reportes')">
                                {{ __('Reportes') }}
                            </x-nav-link>
                        </div>
                    <!--Tablas-->
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link class="text-gray-600" :href="route('tabla.index')" :active="request()->routeIs('tabla.index','tabla.areas','tabla.productos','tabla.existencias')">
                                {{ __('Consultar tablas') }}
                            </x-nav-link>
                        </div>
                    <!--Nuevo Producto-->
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link class="text-gray-600" :href="route('nuevo_producto')" :active="request()->routeIs('nuevo_producto')">
                                {{ __('Nuevo producto') }}
                            </x-nav-link>
                        </div>
                    <!--Entradas-->
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link class="text-gray-600" :href="route('entradas')" :active="request()->routeIs('entradas')">
                                {{ __('Entradas') }}
                            </x-nav-link>
                        </div>
                    <!--Salidas-->
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link class="text-gray-600" :href="route('salidas')" :active="request()->routeIs('salidas')">
                                {{ __('Salidas') }}
                            </x-nav-link>
                        </div>
                @endauth
            </div>

            <!-- Settings Dropdown -->
            @auth
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>

                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @endauth

            <!-- Hamburger -->
            @auth
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400  hover:text-gray-500  hover:bg-gray-100  focus:outline-none focus:bg-gray-100 focus:text-gray-500  transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endauth
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    @auth
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <!--Dashboard-->
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                <!--Reportes-->
                    <x-responsive-nav-link :href="route('reportes')" :active="request()->routeIs('reportes')">
                        {{ __('Reportes') }}
                    </x-responsive-nav-link>
                <!--Tablas-->
                    <x-responsive-nav-link :href="route('tabla.index')" :active="request()->routeIs('tabla.areas','tabla.productos','tabla.existencias')">
                        {{ __('Consultar tablas') }}
                    </x-responsive-nav-link>
                <!--Nuevo Producto-->
                    <x-responsive-nav-link :href="route('nuevo_producto')" :active="request()->routeIs('nuevo_producto')">
                        {{ __('Nuevo producto') }}
                    </x-responsive-nav-link>
                <!--Entradas-->
                    <x-responsive-nav-link :href="route('entradas')" :active="request()->routeIs('entradas')">
                        {{ __('Entradas') }}
                    </x-responsive-nav-link>
                <!--Salidas-->
                    <x-responsive-nav-link :href="route('salidas')" :active="request()->routeIs('salidas')">
                        {{ __('Salidas') }}
                    </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Perfil') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Cerrar sesión') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    @endauth
</nav>
{{-- <div class="h-2 w-full flex justify-center  border-b border-gray-100">
    <div class="w-full h-4 bg-repeat-x" style="background-image: url('https://www.oaxaca.gob.mx/cortv/wp-content/themes/temadeps2023/assets/images/greca.png'); background-size: auto 100%;"></div>
</div> --}}
