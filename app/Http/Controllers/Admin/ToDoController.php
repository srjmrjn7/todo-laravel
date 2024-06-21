<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ToDo;
use Illuminate\Http\Request;
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
        $request->validate([
            'title' => ['required', 'max:100'],
            'photo' => ['image', 'max:2048']
        ]);

        $user = \Auth::user();
        $todo = $request->only(['title', 'email']);

        if($request->hasFile('photo')) {
            $photo = $request->photo;
            $file_name = rand() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('uploads/'), $file_name);
            $todo['photo'] = '/uploads/' . $file_name;
        }

        $user->todos()->create($todo);
        return redirect()->back()->with('success', 'To Do Created!');
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
        $request->validate([
            'title' => ['required', 'max:100'],
            'photo' => ['image', 'max:2048']
        ]);

        $utodo = $request->only(['title', 'email']);

        if($request->hasFile('photo')) {
            if(File::exists(public_path($todo->photo))) {
                File::delete(public_path($todo->photo));
            }
            $photo = $request->photo;
            $file_name = rand() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('uploads/'), $file_name);
            $utodo['photo'] = '/uploads/' . $file_name;
        }

        $todo->update($utodo);
        return redirect()->back()->with('success', 'To Do Created!');
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
