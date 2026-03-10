<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Minhas Tarefas') }}
            </h2>
            <a href="{{ route('tasks.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                + Nova Tarefa
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400 rounded-2xl border border-green-200 dark:border-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Filtros -->
            <div class="mb-8 glass-card p-6 rounded-[2.5rem] border border-gray-100 dark:border-gray-700 shadow-sm transition-all duration-300">
                <form action="{{ route('tasks.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-6 items-end">
                    <!-- Pesquisa -->
                    <div class="md:col-span-2 relative group">
                        <label for="search" class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Pesquisar Tarefa</label>
                        <div class="relative">
                            <input type="text" name="search" id="search" value="{{ request('search') }}" 
                                placeholder="O que procuras?" 
                                class="w-full bg-gray-50/50 dark:bg-gray-800/40 border-gray-100 dark:border-gray-700 rounded-2xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 dark:text-gray-200 pl-11 py-3 transition-all placeholder:text-gray-400">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="relative">
                        <label for="status" class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Status</label>
                        <select name="status" id="status" onchange="this.form.submit()"
                            class="w-full bg-gray-50/50 dark:bg-gray-800/40 border-gray-100 dark:border-gray-700 rounded-2xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 dark:text-gray-200 py-3 transition-all appearance-none cursor-pointer">
                            <option value="">Todos Status</option>
                            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pendentes</option>
                            <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Concluídas</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none mt-6">
                            <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>

                    <!-- Categoria -->
                    <div class="relative">
                        <label for="category_id" class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Categoria</label>
                        <select name="category_id" id="category_id" onchange="this.form.submit()"
                            class="w-full bg-gray-50/50 dark:bg-gray-800/40 border-gray-100 dark:border-gray-700 rounded-2xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 dark:text-gray-200 py-3 transition-all appearance-none cursor-pointer">
                            <option value="">Todas Categorias</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none mt-6">
                            <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </form>
                
                @if(request()->anyFilled(['search', 'status', 'category_id']))
                    <div class="mt-4 pt-4 border-t border-gray-50 dark:border-gray-800 flex justify-between items-center animate-fade-in">
                        <p class="text-xs text-gray-500 italic">
                            Mostrando {{ $tasks->count() }} {{ $tasks->count() == 1 ? 'resultado' : 'resultados' }} para a filtragem atual.
                        </p>
                        <a href="{{ route('tasks.index') }}" class="text-xs font-bold text-indigo-600 hover:text-indigo-500 uppercase tracking-widest transition-colors">
                            Limpar Filtros
                        </a>
                    </div>
                @endif
            </div>

            @if($tasks->count())
                <div class="glass-card rounded-[2.5rem] overflow-hidden border border-gray-100 dark:border-gray-700">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-100 dark:divide-gray-800">
                            <thead class="bg-gray-50/50 dark:bg-gray-900/50">
                                <tr>
                                    <th class="px-8 py-5 text-left text-xs font-bold text-gray-400 uppercase tracking-widest">Tarefa</th>
                                    <th class="px-8 py-5 text-left text-xs font-bold text-gray-400 uppercase tracking-widest">Status</th>
                                    <th class="px-8 py-5 text-left text-xs font-bold text-gray-400 uppercase tracking-widest">Prazo</th>
                                    <th class="px-8 py-5 text-right text-xs font-bold text-gray-400 uppercase tracking-widest">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                                @foreach($tasks as $task)
                                    <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-800/50 transition-colors group">
                                        <td class="px-8 py-6">
                                            <div class="flex flex-col">
                                                <span @class([
                                                    'text-base font-bold text-gray-900 dark:text-gray-100',
                                                    'line-through opacity-50' => $task->status === 'completed',
                                                ])>{{ $task->title }}</span>
                                                <div class="flex items-center gap-2 mt-0.5">
                                                    @if($task->category)
                                                        <span class="flex items-center text-[10px] font-black uppercase tracking-widest px-2 py-0.5 rounded-md bg-gray-100 dark:bg-gray-800 text-gray-500 border border-gray-200 dark:border-gray-700">
                                                            <span class="w-1.5 h-1.5 rounded-full mr-1.5" style="background-color: {{ $task->category->color }}"></span>
                                                            {{ $task->category->name }}
                                                        </span>
                                                    @endif
                                                    @if($task->description)
                                                        <span class="text-sm text-gray-500 line-clamp-1 italic">{{ $task->description }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-6">
                                            <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" @class([
                                                    'inline-flex items-center px-3 py-1 rounded-full text-xs font-bold transition-all hover:scale-105',
                                                    'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400 border border-emerald-200/50 dark:border-emerald-800/50' => $task->status === 'completed',
                                                    'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400 border border-amber-200/50 dark:border-amber-800/50' => $task->status === 'pending',
                                                ])>
                                                    @if($task->status === 'completed')
                                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                                        Concluída
                                                    @else
                                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                                        Pendente
                                                    @endif
                                                </button>
                                            </form>
                                        </td>
                                        <td class="px-8 py-6">
                                            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">
                                                {{ $task->due_date?->format('d M, H:i') ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="px-8 py-6 text-right">
                                            <div class="flex justify-end items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <a href="{{ route('tasks.edit', $task) }}" class="p-2 bg-white dark:bg-gray-900 shadow-sm border border-gray-100 dark:border-gray-700 rounded-xl text-indigo-600 hover:scale-110 transition-all">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                                </a>
                                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Tem certeza?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="p-2 bg-white dark:bg-gray-900 shadow-sm border border-gray-100 dark:border-gray-700 rounded-xl text-red-600 hover:scale-110 transition-all">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                @if(request()->anyFilled(['search', 'status', 'category_id']))
                    <div class="glass p-20 rounded-[3rem] text-center border border-gray-100 dark:border-gray-700">
                        <div class="w-20 h-20 bg-amber-50 dark:bg-amber-900/20 rounded-3xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-amber-500 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-2 text-gray-900 dark:text-gray-100">Nenhum resultado encontrado</h3>
                        <p class="text-gray-500 dark:text-gray-400 mb-8 max-w-sm mx-auto">Não encontramos nenhuma tarefa que corresponda aos teus filtros. Tenta ajustar a pesquisa ou os filtros.</p>
                        <a href="{{ route('tasks.index') }}" class="px-8 py-3 bg-indigo-600 text-white font-bold rounded-2xl hover:scale-105 transition-all inline-block">
                            Limpar Filtros
                        </a>
                    </div>
                @else
                    <div class="glass p-20 rounded-[3rem] text-center">
                        <div class="w-20 h-20 bg-indigo-50 dark:bg-indigo-900/20 rounded-3xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-indigo-500 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Sem tarefas ainda</h3>
                        <p class="text-gray-500 mb-8 max-w-sm mx-auto">Parabéns! Estás em dia com as tuas obrigações. Queres adicionar algo novo?</p>
                        <a href="{{ route('tasks.create') }}" class="px-8 py-3 bg-gray-900 dark:bg-white text-white dark:text-gray-900 font-bold rounded-2xl hover:scale-105 transition-all inline-block">
                            Começar Agora
                        </a>
                    </div>
                @endif
            @endif
        </div>
    </div>
</x-app-layout>
