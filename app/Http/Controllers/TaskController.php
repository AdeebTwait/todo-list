<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(User $user)
    {
    	$tasks = Task::where('user_id', $user->id)->get();
    	return view('list.show')->withTasks($tasks);
    }

    public function store(Request $request, User $user)
    {
    	$task = new Task;
        $task->user_id = $user->id;
        $task->title = request('title');
        $task->done = false;
        $task->save();

        return response()->json([
            'message' => 'Task had been created successfully',
            'success' => true,
            'id' => $task->id,
        ]);
    }

    public function destroy(Task $task)
    {
    	$task->delete();
    	$response["status"] = "success";
        $response["message"] = 'Deleted successfully';                
        return response()->json($response); 
    }

    public function toggleDone(Task $task)
    {
    	$task->toggleDone();
    	return response()->json([
            'message' => 'Your task had been toggled',
            'success'=> true
        ]); 
    }

}
