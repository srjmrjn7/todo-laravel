<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;
use File;

class ToDoController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ToDo::class, 'todo');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        $data = array(
            'todo' => $todo
        );
        return view('todo.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ToDo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToDo $todo)
    {
        if(File::exists(public_path($todo->photo))) {
            File::delete(public_path($todo->photo));
        }
        $todo->deleteOrFail();
        return redirect()->back()->with('success', 'To Do was deleted!');
    }
}
