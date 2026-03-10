<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-extrabold text-gray-900 dark:text-white">
            {{ __('Bem-vindo de volta') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Faça login para gerir as suas tarefas') }}
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-xs uppercase tracking-widest font-bold text-gray-500 dark:text-gray-400" />
            <x-text-input id="email" class="block mt-1 w-full bg-white/50 dark:bg-gray-900/50 border-gray-200 dark:border-gray-700 focus:ring-indigo-500 transition-all" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="seu@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between">
                <x-input-label for="password" :value="__('Palavra-passe')" class="text-xs uppercase tracking-widest font-bold text-gray-500 dark:text-gray-400" />
                @if (Route::has('password.request'))
                    <a class="text-xs font-semibold text-indigo-600 hover:text-indigo-500 dark:text-indigo-400" href="{{ route('password.request') }}">
                        {{ __('Esqueceu-se?') }}
                    </a>
                @endif
            </div>

            <x-text-input id="password" class="block mt-1 w-full bg-white/50 dark:bg-gray-900/50 border-gray-200 dark:border-gray-700 focus:ring-indigo-500 transition-all"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded-md border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 bg-white/50 dark:bg-gray-900/50" name="remember">
                <span class="ms-2 text-xs font-medium text-gray-600 dark:text-gray-400">{{ __('Lembrar-me') }}</span>
            </label>
        </div>

        <div>
            <x-primary-button class="w-full justify-center py-3 text-sm font-bold tracking-widest bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 shadow-lg shadow-indigo-200 dark:shadow-none transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                {{ __('Entrar') }}
            </x-primary-button>
        </div>

        <div class="pt-4 text-center border-t border-gray-100 dark:border-gray-700">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                {{ __('Não tem uma conta?') }}
                <a href="{{ route('register') }}" class="font-bold text-indigo-600 hover:text-indigo-500 dark:text-indigo-400">
                    {{ __('Registe-se agora') }}
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>

