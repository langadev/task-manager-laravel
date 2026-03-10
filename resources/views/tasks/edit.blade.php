<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Tarefa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="relative group">
                <!-- Decorative Blur -->
                <div class="absolute -inset-1 bg-gradient-to-r from-amber-500 to-orange-500 rounded-[2.5rem] blur opacity-25 group-hover:opacity-40 transition duration-1000 group-hover:duration-200"></div>

                <form action="{{ route('tasks.update', $task) }}" method="POST" class="relative bg-white dark:bg-gray-800 shadow-2xl rounded-[2.5rem] p-10 space-y-8 border border-white/20">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="title" class="flex items-center text-sm font-bold text-gray-700 dark:text-gray-200 mb-2">
                            <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Título da Tarefa
                        </label>
                        <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}"
                            @class([
                                'block w-full px-5 py-4 rounded-2xl shadow-sm transition-all outline-none border-2',
                                'border-red-500 bg-red-50/10 focus:ring-red-500/20' => $errors->has('title'),
                                'border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10' => !$errors->has('title'),
                            ])>
                        @error('title') <p class="text-red-500 text-sm mt-2 font-medium flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="category_id" class="flex items-center text-sm font-bold text-gray-700 dark:text-gray-200 mb-2">
                            <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"></path></svg>
                            Categoria
                        </label>
                        <select name="category_id" id="category_id"
                            @class([
                                'block w-full px-5 py-4 rounded-2xl shadow-sm transition-all outline-none border-2',
                                'border-red-500 bg-red-50/10 focus:ring-red-500/20' => $errors->has('category_id'),
                                'border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10' => !$errors->has('category_id'),
                            ])>
                            <option value="">{{ __('Sem Categoria') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $task->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-red-500 text-sm mt-2 font-medium flex items-center">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="description" class="flex items-center text-sm font-bold text-gray-700 dark:text-gray-200 mb-2">
                            <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                            Descrição
                        </label>
                        <textarea name="description" id="description" rows="4"
                            @class([
                                'block w-full px-5 py-4 rounded-2xl shadow-sm transition-all outline-none border-2',
                                'border-red-500 bg-red-50/10 focus:ring-red-500/20' => $errors->has('description'),
                                'border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10' => !$errors->has('description'),
                            ])>{{ old('description', $task->description) }}</textarea>
                        @error('description') <p class="text-red-500 text-sm mt-2 font-medium flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-10a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="due_date" class="flex items-center text-sm font-bold text-gray-700 dark:text-gray-200 mb-2">
                                <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                Prazo
                            </label>
                            <input type="datetime-local" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date?->format('Y-m-d\TH:i')) }}"
                                @class([
                                    'block w-full px-5 py-4 rounded-2xl shadow-sm transition-all outline-none border-2',
                                    'border-red-500 bg-red-50/10 focus:ring-red-500/20' => $errors->has('due_date'),
                                    'border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10' => !$errors->has('due_date'),
                                ])>
                            @error('due_date') <p class="text-red-500 text-sm mt-2 font-medium flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="status" class="flex items-center text-sm font-bold text-gray-700 dark:text-gray-200 mb-2">
                                <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Status
                            </label>
                            <select name="status" id="status"
                                @class([
                                    'block w-full px-5 py-4 rounded-2xl shadow-sm transition-all outline-none border-2',
                                    'border-red-500 bg-red-50/10 focus:ring-red-500/20' => $errors->has('status'),
                                    'border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10' => !$errors->has('status'),
                                ])>
                                <option value="pending" {{ old('status', $task->status) === 'pending' ? 'selected' : '' }}>Pendente</option>
                                <option value="completed" {{ old('status', $task->status) === 'completed' ? 'selected' : '' }}>Concluída</option>
                            </select>
                            @error('status') <p class="text-red-500 text-sm mt-2 font-medium flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-4">
                        <a href="{{ route('tasks.index') }}" class="px-8 py-4 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-2xl hover:bg-gray-200 dark:hover:bg-gray-600 transition-all font-bold text-sm">
                            Cancelar
                        </a>
                        <button type="submit" class="group relative px-10 py-4 bg-indigo-600 dark:bg-indigo-500 text-white font-bold rounded-2xl shadow-xl hover:scale-105 active:scale-95 transition-all">
                            Atualizar Tarefa
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
