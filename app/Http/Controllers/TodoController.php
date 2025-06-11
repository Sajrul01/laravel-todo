<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('todos.index', ['todos' => Todo::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
       public function store(Request $request)
       {
        $request->validate(['title' => 'required']);
        Todo::create(['title' => $request->title]);
        return redirect()->back();
      }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $todo->update(['is_completed' => !$todo->is_completed]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back();
    }
}
