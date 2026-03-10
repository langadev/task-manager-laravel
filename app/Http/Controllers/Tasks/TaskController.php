<?php

namespace App\Http\Controllers\Tasks;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Tasks\StoreTaskRequest;
use App\Http\Requests\Tasks\UpdateTaskRequest;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Listar todas as tarefas do usuário logado.
     */
    public function index(Request $request)
    {
        $query = Auth::user()->tasks()->with('category')->latest();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $tasks = $query->get();
        $categories = Auth::user()->categories()->get();

        return view('tasks.index', compact('tasks', 'categories'));
    }

    /**
     * Mostrar formulário para criar nova tarefa.
     */
    public function create()
    {
        $categories = Auth::user()->categories()->get();
        return view('tasks.create', compact('categories'));
    }

    /**
     * Salvar nova tarefa no banco.
     */
   public function store(StoreTaskRequest $request)
{
    Auth::user()->tasks()->create($request->validated());

    return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
}

    /**
     * Mostrar uma tarefa específica (opcional).
     */
    public function show(Task $task)
    {
        Gate::authorize('view', $task);
        return view('tasks.show', compact('task'));
    }

    /**
     * Mostrar formulário de edição da tarefa.
     */
    public function edit(Task $task)
    {
        Gate::authorize('update', $task);
        $categories = Auth::user()->categories()->get();
        return view('tasks.edit', compact('task', 'categories'));
    }

    /**
     * Atualizar tarefa.
     */
    public function update(UpdateTaskRequest $request, Task $task)
{
    Gate::authorize('update', $task);

    $task->update($request->validated());

    return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
}

    /**
     * Deletar tarefa.
     */
    public function destroy(Task $task)
    {
        Gate::authorize('delete', $task);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tarefa deletada com sucesso!');
    }

    /**
     * Alternar status da tarefa.
     */
    public function toggleStatus(Task $task)
    {
        Gate::authorize('update', $task);

        $task->update([
            'status' => $task->status === 'completed' ? 'pending' : 'completed'
        ]);

        return back()->with('success', 'Status atualizado!');
    }
}