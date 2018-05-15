<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Validator;
use Auth;

class TaskController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $tasks = Task::orderBy('create_at', 'asc')->get();

    return view('tasks', [
      'tasks' => $tasks
    ]);
  }

  public function create(Request $request)
  {
    // バリデーション
    $validator = Validator::make($request->all(), [
      'task_name' => 'required | min: 1 | max: 255'
    ]);

    // バリデーションエラー
    if($validator->fails()) {
      return redirect('/tasks')
        ->withInput()
        ->withErrors($validator);
    }

    // Eloquentモデル
    $tasks = new Task;
    $tasks->user_id = Auth::user()->id;
    $tasks->task_name = $request->task_name;
    $tasks->save();

    return redirect('/tasks');
  }

  public function delete(Task $task)
  {
    $task->delete();

    return redirect('/tasks');
  }
}
