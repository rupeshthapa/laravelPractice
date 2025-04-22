<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    /**
     * Show the form for creating a new resource.
     */
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Task::create([
            'user_id' => Auth::id(),
            'title' => $request->input('title')
        ]);

        return redirect()->back()->with('added', 'Task created successfully.');
    }

    public function index(){
        $tasks = Task::where('user_id', Auth::id())->latest()->get();
        return view('home', compact('tasks'));
    }


    public function edit(Task $task){
      
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task){
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $task->title = $request->title;
        $task->save();

        return redirect()->route('home')->with('updated', 'Task updated successfully.');
    }

    public function destroy(Task $task){
        $task->delete();
        return redirect()->back()->with('deleted', 'Task deleted successfully.');
    }

}
