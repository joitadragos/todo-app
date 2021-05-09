<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Todocontroller extends Controller
{
    public function index(){
        $todo = Todo::all();
        return view('home', compact('todos'));
    }
    public function store(Request $request){
        $request->validate([
            'todo'=>'required',
        ]);
        $todo = new Todo();
        $todo->todo = $request->todo;
        $todo->save();
        return Response::json($todo);
    }

    /**
     * @param Todo $todo
     * @param Request $request
     */
    public function update(Todo $todo, Request $request){
        $request->validate([
           'todo'=>'required',
        ]);
        $todo->todo = $request->todo;
        $todo->save();
        return Response::json($todo);
    }

    public function destroy(Todo $todo){
        $todo->delete();
        return Response::json($todo);
    }
}
