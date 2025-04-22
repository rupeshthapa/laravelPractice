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
                    <div class="row">
                        <div class="col-9">
                            @if (session('added'))
                                <p style="color: green;">{{session('added')}}</p>
                            @endif

                            @if (session('deleted'))
                                <p style="color: red;">{{session('deleted')}}</p>
                            @endif
                            <form action="{{ route('store') }}" method="POST" id="taskForm">
                                @csrf
                            <input type="text" class="form-control" placeholder="Add a new task..." name="title">
                            @error('title')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-3">
                            <button class="btn btn-primary w-100" id="addTaskButton">Add Task</button>
                        </div>
                    </form>
                    </div>
                
                    <ul class="list-group mt-3" id="taskList">
                        @foreach ($tasks as $task )
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $task->title }}
                                <form action="{{ route('task.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">🗑️</button>
                        @endforeach
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
