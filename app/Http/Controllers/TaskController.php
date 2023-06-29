<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
        return response()->json([
            'status' => true,
            'tasks' => $user->tasks,
            'message'=> $user->tasks->count() ? 'All Tasks' : 'No Tasks'],200);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
            ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ], 401);
        }
        $user = Auth::user();
        $task = Task::create(['user_id'=> $user->id,'title'=> $request->title,'description'=> $request->description]);
        return response()->json([
            'status' => true,
            'message'=> 'Task Created'],200);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'task_id' => ['required', 'numeric'],
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['boolean'],
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ], 401);
        }
        $user = Auth::user();
        $task = Task::where('id',$request->task_id)->where('user_id',$user->id)->first();
        if(!$task){
            return response()->json([
                'status' => false,
                'message'=> 'Task not found'],401);
        }
        if($request->title) $task->title = $request->title;
        if($request->description) $task->description = $request->description;
        if($request->status) $task->status = $request->status;
        $task->save();
        return response()->json([
            'status' => true,
            'message'=> 'Task Updated'],200);
    }

    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'task_id' => ['required', 'numeric'],
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ], 401);
        }
        $user = Auth::user();
        $task = Task::where('id',$request->task_id)->where('user_id',$user->id)->first();
        if(!$task){
            return response()->json([
                'status' => false,
                'message'=> 'Task not found'],401);
        }
        $task->delete();
        return response()->json([
            'status' => true,
            'message'=> 'Task Deleted'],200);

    }
}
