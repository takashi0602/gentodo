<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Symfony\Component\Console\Helper\TableCell;
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
    $tasks = Task::where('user_id', Auth::user()->id)->orderBy('create_at', 'asc')->get();

    return view('tasks', [
      'tasks' => $tasks
    ]);
  }

  public function create(Request $request)
  {
    // バリデーション
    $validator = Validator::make($request->all(), [
      'task_name' => 'required | min: 1 | max: 50'
    ]);

    // バリデーションエラー
    if($validator->fails()) {
      return redirect('/tasks')
        ->withInput()
        ->withErrors($validator);
    }

    // createメソッド
    Task::create([
      'user_id' => Auth::user()->id,
      'task_name' => $request->task_name
    ]);

    return redirect('/tasks');
  }

  public function edit($task_id)
  {
    $task = Task::where('user_id', Auth::user()->id)->find($task_id);

    return view('edit', [
      'task' => $task
    ]);
  }

  public function update(Request $request)
  {
    // バリデーション
    $validator = Validator::make($request->all(), [
      'task_name' => 'required | min: 1 | max: 50'
    ]);

    // バリデーションエラー
    if($validator->fails()) {
      return redirect('/tasks/edit')
        ->withInput()
        ->withErrors($validator);
    }

    Task::updateOrCreate(
      [ 'user_id' => Auth::user()->id, 'id' => $request->id ],
      [ 'user_id' => Auth::user()->id, 'task_name' => $request->task_name ]
    );

    return redirect('/tasks');
  }

  public function delete(Task $task)
  {
    $task->delete();

    return redirect('/tasks');
  }
}
