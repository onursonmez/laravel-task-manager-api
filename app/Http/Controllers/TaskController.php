<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,completed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $task = Task::create($request->all());
        return response()->json($task, 201);
    }

    public function index(Request $request)
    {
        $tasks = Task::paginate(10);
        return response()->json($tasks);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,completed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $task->status = $request->status;
        $task->save();

        return response()->json($task);
    }
}
