<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
{
    $completedTasks = Task::where('status', 'completed')->get();
    $pendingTasks = Task::where('status', 'pending')->get();
    $ongoingTasks = Task::where('status', 'ongoing')->get();
    $tasks = Task::all();
    return view('dashboard', compact('completedTasks', 'pendingTasks', 'ongoingTasks', 'tasks'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $tasks = Task::all();
        return view('create', compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name'=>['required','string'],
            'status' => 'required|in:pending,ongoing,completed', // Validate status
            
        ]);
        $formFields['user_id']= Auth::user()->id;
        $task = Task::create($formFields);
        return redirect()->route('dashboard')->with('success','Task created successfully');
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
    public function edit(string $id)
    {
        $task = Task::find($id);
     return view('edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, User $user)
    {
        
            $task = Task::find($id);
        $formFields = $request->validate([
            'name'=>['required','string'],
            'status' => 'required|in:pending,ongoing,completed', // Validate statu
        ]);
        $formFields['user_id']= Auth::user()->id;
        $task->update($formFields);
        return redirect()->route('dashboard')->with('success','Task updated successfully');
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('dashboard')->with('success','Deleted successfully');
    }
}
