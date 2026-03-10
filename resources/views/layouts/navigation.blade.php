<nav 
    x-data="{ mobileOpen: false }"
    class="sticky top-0 z-50 backdrop-blur-xl bg-white/80 dark:bg-gray-900/80 border-b border-gray-200/50 dark:border-gray-800/50">

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

<div class="flex justify-between items-center h-16">

<!-- Logo -->
<div class="flex items-center gap-8">

<a href="{{ route('dashboard') }}" 
class="flex items-center gap-2 group">

<div class="w-8 h-8 flex items-center justify-center rounded-lg bg-gradient-to-tr from-indigo-600 to-purple-600 text-white font-bold shadow-lg">
T
</div>

<span class="text-xl font-bold tracking-tight 
bg-gradient-to-r from-indigo-600 to-purple-600 
dark:from-indigo-400 dark:to-purple-400 
bg-clip-text text-transparent">

Taskly

</span>

</a>


<!-- Desktop Navigation -->

<div class="hidden sm:flex items-center gap-2">

<x-nav-link 
:href="route('dashboard')" 
:active="request()->routeIs('dashboard')" 
class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-800">

Painel

</x-nav-link>

</div>

</div>


<!-- Right Side -->

<div class="hidden sm:flex items-center gap-3">

@auth

<div class="relative" x-data="{ userMenu: false }" @click.outside="userMenu = false">

<button
@click="userMenu = !userMenu"
class="flex items-center gap-3 px-2 py-1 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition">

<!-- Avatar -->

<div class="w-8 h-8 flex items-center justify-center rounded-full 
bg-gradient-to-br from-indigo-500 to-purple-500 
text-white text-xs font-bold">

{{ auth()->user()->name[0] }}

</div>


<!-- User Name -->

<span class="text-sm font-medium text-gray-700 dark:text-gray-200">

{{ auth()->user()->name }}

</span>


<!-- Arrow -->

<svg 
class="w-4 h-4 text-gray-400 transition-transform"
:class="{ 'rotate-180': userMenu }"
fill="none" 
stroke="currentColor" 
viewBox="0 0 24 24">

<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>

</svg>

</button>


<!-- Dropdown -->

<div
x-show="userMenu"
x-cloak
x-transition:enter="transition ease-out duration-200"
x-transition:enter-start="opacity-0 scale-95"
x-transition:enter-end="opacity-100 scale-100"
x-transition:leave="transition ease-in duration-75"
x-transition:leave-start="opacity-100 scale-100"
x-transition:leave-end="opacity-0 scale-95"
class="absolute right-0 mt-3 w-56 rounded-xl shadow-lg
bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800
overflow-hidden">

<div class="px-4 py-3 border-b dark:border-gray-800">

<p class="text-xs text-gray-400 uppercase tracking-wider">

Conta

</p>

<p class="text-sm text-gray-600 dark:text-gray-400 truncate">

{{ Auth::user()->email }}

</p>

</div>


<x-dropdown-link 
:href="route('profile.edit')" 
class="flex items-center gap-2">

Meu Perfil

</x-dropdown-link>


<form method="POST" action="{{ route('logout') }}">

@csrf

<x-dropdown-link 
:href="route('logout')"
onclick="event.preventDefault(); this.closest('form').submit();"
class="text-red-500">

Sair

</x-dropdown-link>

</form>

</div>

</div>

@endauth

</div>



<!-- Mobile Menu Button -->

<div class="sm:hidden">

<button 
@click="mobileOpen=!mobileOpen"
class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">

<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

<path 
x-show="!mobileOpen"
stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
d="M4 6h16M4 12h16M4 18h16"/>

<path 
x-show="mobileOpen"
stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
d="M6 18L18 6M6 6l12 12"/>

</svg>

</button>

</div>

</div>

</div>



<!-- Mobile Menu -->

<div 
x-show="mobileOpen"
x-transition
class="sm:hidden border-t dark:border-gray-800 bg-white dark:bg-gray-900">

<div class="px-4 pt-3 pb-5 space-y-1">

<x-responsive-nav-link 
:href="route('dashboard')" 
:active="request()->routeIs('dashboard')">

Painel

</x-responsive-nav-link>


@auth

<div class="border-t border-gray-200 dark:border-gray-800 pt-4">

<div class="flex items-center px-4 mb-3 gap-3">

<div class="w-10 h-10 rounded-full bg-indigo-500 flex items-center justify-center text-white font-bold">

{{ auth()->user()->name[0] }}

</div>

<div>

<div class="font-medium text-gray-800 dark:text-gray-200">

{{ Auth::user()->name }}

</div>

<div class="text-sm text-gray-500">

{{ Auth::user()->email }}

</div>

</div>

</div>


<x-responsive-nav-link :href="route('profile.edit')">

Perfil

</x-responsive-nav-link>


<form method="POST" action="{{ route('logout') }}">

@csrf

<x-responsive-nav-link 
:href="route('logout')" 
onclick="event.preventDefault(); this.closest('form').submit();"
class="text-red-500">

Sair

</x-responsive-nav-link>

</form>

</div>

@endauth

</div>

</div>

</nav>