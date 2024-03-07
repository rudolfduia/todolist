<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;

class TodoCoontroller extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view('todos.index', [
            'todos'=>$todos
        ]);
    }
    public function create()
    {
        return view('todos.create');
    }
    public function store(TodoRequest $request)
    {
        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => 0
            ]);
            $request->session()->flash('alert-success','Todo created succesfully');
            return to_route('todos.index');
    }
    public function show($id)
    {
        $todo = Todo::find($id);
        if(!$todo)
        {
            abort(404);
        }
        return view('todos.show', [
            'todo'=>$todo
        ]);
    }
    // public function completed($id)
    // {
    //     $todo = Todo::find($id);
    //     if(!$todo)
    //     {
    //         abort(404);
    //     }
    //     $todo->is_completed = 1;
    //     $todo->save();
    //     return to_route('todos.index');
    // }
    // public function notcompleted($id)
    // {
    //     $todo = Todo::find($id);
    //     if(!$todo)
    //     {
    //         abort(404);
    //     }
    //     $todo->is_completed = 0;
    //     $todo->save();
    //     return to_route('todos.index');
    
    // }
    public function Delete(Request $request,$id)
    {
        $todo = Todo::find($id);
        if(!$todo)
        {
            abort(404);
        }
        $todo->delete();
        $request->session()->flash('alert-success','Todo deleted succesfully');
        return to_route('todos.index');
    }
    
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view("todos.edit",[
            'todo' => $todo
            ]);
    }
    public function update(TodoRequest $request)
    {
       $todo = Todo::find($request->todo_id);
       $todo ->update([
           'title' => $request->title,
           'description' => $request->description,
           'is_completed' => $request->is_completed,
       ]);
        $request->session()->flash('alert-success','Todo updated succesfully');
       return to_route('todos.index');
    }
}  

