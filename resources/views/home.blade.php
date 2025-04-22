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
                            <input type="text" class="form-control" placeholder="Add a new task..." id="taskInput">
                        </div>
                        <div class="col-3">
                            <button class="btn btn-primary w-100" id="addTaskButton">Add Task</button>
                        </div>
                    </div>
                
                    <ul class="list-group mt-3" id="taskList">
                        <!-- Task items will be dynamically added here -->
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
