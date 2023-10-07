<?php

namespace App\Http\Controllers;

use App\Exports\TodoExport;
use Illuminate\Http\Request;
use App\Models\Todo;
// use App\Http\Requests;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TodoController extends Controller
{
    public function index(): View
    {
        $todos = Todo::all();
        $data = [
            'todos' => $todos
        ];
        return view('todos.index', $data);
    }
    public function approval(): View
    {
        $todos = Todo::all();
        $data = [
            'todos' => $todos
        ];
        return view('todos.index', $data);
    }
    public function dashboard(): View
    {
        $todos = Todo::all();
        $data = [
            'todos' => $todos
        ];

        // Mengambil data pengguna yang sedang login
        return view('dashboard', $data);
    }
    public function exportexcel()
    {
        return Excel::download(new TodoExport, 'todo.xlsx');
    }
    public function create(): View
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        Todo::create($request->all());

        return redirect('/todo');
    }

    public function edit(string $id): View
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->update($request->all());

        return redirect('/todo');
    }
    public function delete(Todo $todo)
    {
        $todo->delete();

        return redirect('/todo');
    }
}
