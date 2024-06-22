@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>{{ __('To Do List') }}</h3>
            <a href="{{route('todo.create')}}">Create New</a>
        </div>

        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible show" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todos as $todo)
                    <tr>
                        <th scope="row">{{$todo->id}}</th>
                        <td>{{$todo->title}}</td>
                        <td><img src="{{asset('storage/' . $todo->photo)}}" class="todo-list-image"></td>
                        <td>{{$todo->status ? 'finished' : 'not finished'}}</td>
                        <td>
                            <a href="{{route('todo.edit', $todo->id)}}">Update</a>
                            <form action="{{route('todo.destroy', $todo->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item del">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$todos->links()}}
        </div>
    </div>
</div>
@endsection