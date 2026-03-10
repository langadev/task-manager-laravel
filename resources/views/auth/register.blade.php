<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-extrabold text-gray-900 dark:text-white">
            {{ __('Crie a sua conta') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Comece a organizar o seu dia hoje') }}
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome')" class="text-xs uppercase tracking-widest font-bold text-gray-500 dark:text-gray-400" />
            <x-text-input id="name" class="block mt-1 w-full bg-white/50 dark:bg-gray-900/50 border-gray-200 dark:border-gray-700 focus:ring-indigo-500 transition-all" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="O seu nome" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-xs uppercase tracking-widest font-bold text-gray-500 dark:text-gray-400" />
            <x-text-input id="email" class="block mt-1 w-full bg-white/50 dark:bg-gray-900/50 border-gray-200 dark:border-gray-700 focus:ring-indigo-500 transition-all" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="seu@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Palavra-passe')" class="text-xs uppercase tracking-widest font-bold text-gray-500 dark:text-gray-400" />
            <x-text-input id="password" class="block mt-1 w-full bg-white/50 dark:bg-gray-900/50 border-gray-200 dark:border-gray-700 focus:ring-indigo-500 transition-all"
                            type="password"
                            name="password"
                            required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmar Palavra-passe')" class="text-xs uppercase tracking-widest font-bold text-gray-500 dark:text-gray-400" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full bg-white/50 dark:bg-gray-900/50 border-gray-200 dark:border-gray-700 focus:ring-indigo-500 transition-all"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center py-3 text-sm font-bold tracking-widest bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 shadow-lg shadow-indigo-200 dark:shadow-none transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                {{ __('Registar') }}
            </x-primary-button>
        </div>

        <div class="pt-4 text-center border-t border-gray-100 dark:border-gray-700">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                {{ __('Já tem uma conta?') }}
                <a href="{{ route('login') }}" class="font-bold text-indigo-600 hover:text-indigo-500 dark:text-indigo-400">
                    {{ __('Entrar') }}
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>

