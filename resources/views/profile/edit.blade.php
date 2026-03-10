<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white tracking-tight">
            {{ __('Perfil') }}
        </h2>
        <p class="text-gray-500 dark:text-gray-400 mt-1 font-medium italic">
            {{ __('Gere as tuas informações de conta e definições de segurança.') }}
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <div class="p-6 sm:p-10 glass-card rounded-[2.5rem]">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-6 sm:p-10 glass-card rounded-[2.5rem]">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-6 sm:p-10 glass-card rounded-[2.5rem] border-l-4 border-l-red-500">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

