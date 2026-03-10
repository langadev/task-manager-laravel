<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-extrabold text-gray-900 dark:text-white">
            {{ __('Recuperar Palavra-passe') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Esqueceu-se da sua senha? Não há problema. Informe-nos o seu endereço de e-mail e enviaremos um link para redefinir.') }}
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-xs uppercase tracking-widest font-bold text-gray-500 dark:text-gray-400" />
            <x-text-input id="email" class="block mt-1 w-full bg-white/50 dark:bg-gray-900/50 border-gray-200 dark:border-gray-700 focus:ring-indigo-500 transition-all" type="email" name="email" :value="old('email')" required autofocus placeholder="seu@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-primary-button class="w-full justify-center py-3 text-sm font-bold tracking-widest bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 shadow-lg shadow-indigo-200 dark:shadow-none transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                {{ __('Enviar Link de Recuperação') }}
            </x-primary-button>
        </div>

        <div class="pt-4 text-center border-t border-gray-100 dark:border-gray-700">
            <a href="{{ route('login') }}" class="text-sm font-bold text-indigo-600 hover:text-indigo-500 dark:text-indigo-400">
                {{ __('Voltar para o Login') }}
            </a>
        </div>
    </form>
</x-guest-layout>

