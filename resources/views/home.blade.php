@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <span class="fw-bold fs-4">📝 My ToDo List</span>
                </div>

                <div class="card-body">
                    {{-- Session Messages --}}
                    @if (session('added'))
                        <p style="color: green;">{{ session('added') }}</p>
                    @endif
                    @if (session('deleted'))
                        <p style="color: red;">{{ session('deleted') }}</p>
                    @endif
                    @if (session('updated'))
                        <p style="color: blue;">{{ session('updated') }}</p>
                    @endif
                    @if (session('toggled'))
                        <p style="color: blue;">{{ session('toggled') }}</p>
                    @endif

                    {{-- Show if logged in --}}
                    @auth
                    <form action="{{ route('store') }}" method="POST" id="taskForm">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-9">
                                <input type="text" class="form-control" placeholder="Add a new task..." name="title">
                                @error('title')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-3">
                                <button class="btn btn-primary w-100">Add Task</button>
                            </div>
                        </div>
                    </form>

                    {{-- Task List --}}
                    <ul class="list-group mt-3" id="taskList">
                        @if ($tasks->isNotEmpty())
                           
                                
                            
                        @foreach ($tasks as $task)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <form action="{{ route('task.toggle', $task->id) }}" method="POST" class="me-2">
                                        @csrf
                                        @method('PATCH')
                                        <input type="checkbox" class="form-check-input" name="completed"
                                            {{ $task->completed ? 'checked' : '' }} onchange="this.form.submit()">
                                    </form>
                                    <span style="{{ $task->completed ? 'text-decoration: line-through;' : '' }}">
                                        {{ $task->title }}
                                    </span>
                                </div>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('task.edit', $task->id) }}" class="btn btn-warning btn-sm">✏️</a>
                                    <form action="{{ route('task.destroy', $task->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this task?')" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">🗑️</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                        @endif
                    </ul>
                    @endauth

                    {{-- Show if guest --}}
                    @guest
                        <p class="text-center mt-3">Please <a href="{{ route('login') }}">login</a> to manage your tasks.</p>
                    @endguest

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
