<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white tracking-tight">
                    {{ __('Olá, :name!', ['name' => explode(' ', Auth::user()->name)[0]]) }} 👋
                </h2>
                <p class="text-gray-500 dark:text-gray-400 mt-1 font-medium italic">
                    {{ __('Bem-vindo ao seu painel de produtividade.') }}
                </p>
            </div>
            
            <!-- Botão Header -->
            <a href="{{ route('tasks.create') }}" 
                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold rounded-2xl shadow-lg shadow-indigo-200 dark:shadow-none hover:scale-105 active:scale-95 transition-all">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                {{ __('Nova Tarefa') }}
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="glass-card p-6 rounded-3xl border-l-4 border-l-indigo-500">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-bold text-gray-500 uppercase tracking-widest">{{ __('Total') }}</span>
                    <div class="p-2 bg-indigo-50 dark:bg-indigo-900/30 rounded-xl text-indigo-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                    </div>
                </div>
                <p class="text-3xl font-black">{{ $stats['total'] }}</p>
            </div>

            <div class="glass-card p-6 rounded-3xl border-l-4 border-l-amber-500">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-bold text-gray-500 uppercase tracking-widest">{{ __('Pendentes') }}</span>
                    <div class="p-2 bg-amber-50 dark:bg-amber-900/30 rounded-xl text-amber-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>
                <p class="text-3xl font-black">{{ $stats['pending'] }}</p>
            </div>

            <div class="glass-card p-6 rounded-3xl border-l-4 border-l-emerald-500">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-bold text-gray-500 uppercase tracking-widest">{{ __('Concluídas') }}</span>
                    <div class="p-2 bg-emerald-50 dark:bg-emerald-900/30 rounded-xl text-emerald-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                </div>
                <p class="text-3xl font-black">{{ $stats['completed'] }}</p>
            </div>
        </div>

        @if($stats['total'] > 0)
            <!-- Recent Tasks -->
            <div class="glass-card rounded-[2.5rem] overflow-hidden">
                <div class="px-8 py-6 border-b border-gray-100 dark:border-gray-700 flex justify-between items-center bg-gray-50/50 dark:bg-gray-900/50">
                    <h3 class="text-lg font-bold">{{ __('Tarefas Recentes') }}</h3>
                    <a href="{{ route('tasks.index') }}" class="text-sm font-bold text-indigo-600 hover:text-indigo-500">{{ __('Ver Todas') }} &rarr;</a>
                </div>
                <div class="divide-y divide-gray-100 dark:divide-gray-700">
                    @foreach($recentTasks as $task)
                        <div class="px-8 py-4 flex items-center justify-between hover:bg-gray-50/50 dark:hover:bg-gray-800/50 transition-colors">
                            <div class="flex items-center gap-4">
                                <div @class([
                                    'w-3 h-3 rounded-full',
                                    'bg-amber-500' => $task->status === 'pending',
                                    'bg-green-500' => $task->status === 'completed',
                                ])></div>
                                <div>
                                    <p @class([
                                        'font-bold text-gray-900 dark:text-gray-100',
                                        'line-through opacity-50' => $task->status === 'completed',
                                    ])>{{ $task->title }}</p>
                                    <p class="text-xs text-gray-500">{{ $task->due_date?->diffForHumans() ?? __('Sem prazo') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <a href="{{ route('tasks.edit', $task) }}" class="p-2 text-gray-400 hover:text-indigo-600 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="glass p-12 rounded-[2.5rem] text-center">
                <div class="inline-flex items-center justify-center p-6 bg-indigo-50 dark:bg-indigo-900/20 rounded-full mb-6">
                    <svg class="w-16 h-16 text-indigo-500 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ __('Pronto para começar?') }}</h2>
                <p class="text-gray-500 dark:text-gray-400 max-w-sm mx-auto mb-8 font-medium">
                    {{ __('Ainda não tens tarefas para hoje. Cria a tua primeira tarefa e começa a organizar o teu dia.') }}
                </p>

                <a href="{{ route('tasks.create') }}" 
                    class="px-8 py-3 bg-gray-900 dark:bg-white text-white dark:text-gray-900 font-bold rounded-2xl hover:scale-105 transition-all inline-block">
                    {{ __('Criar Primeira Tarefa') }}
                </a>
            </div>
        @endif
    </div>
</x-app-layout>