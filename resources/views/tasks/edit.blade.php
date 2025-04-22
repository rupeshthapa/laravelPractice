@extends('layouts.app')
@section('content')

<div class="container">
    <h2>Edit Task</h2>

    <form action="{{ route('task.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Task Title</label>
                <input type="text" class="form-control" id="taskTitle" name="title" value="{{ $task->title }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Task</button>
        <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
            </form>
</div>
@endsection