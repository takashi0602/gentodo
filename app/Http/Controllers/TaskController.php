<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use App\Record;
use Illuminate\Http\Request;
use function Sodium\increment;
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
    $tasks = Task::where('user_id', Auth::user()->id)->where('complete_flg', false)->orderBy('create_at', 'asc')->get();

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
      [ 'task_name' => $request->task_name ]
    );

    return redirect('/tasks');
  }

  public function complete(Request $request)
  {
    Task::updateOrCreate(
      [ 'user_id' => Auth::user()->id, 'id' => $request->id ],
      [ 'complete_flg' => true ]
    );

    $amount = ++Auth::user()->amount;

    $record_id = Auth::user()->record_id;

    if($amount === 10) {
      $record_id = 2;
    } elseif($amount === 50) {
      $record_id = 3;
    } elseif($amount === 100) {
      $record_id = 4;
    }

    User::updateOrCreate(
      [ 'id' => Auth::user()->id ],
      [ 'amount' => $amount, 'record_id' => $record_id ]
    );

    return redirect('/tasks');
  }

  public function mypage()
  {
    $tasks = Task::where('user_id', Auth::user()->id)->where('complete_flg', true)->orderBy('create_at', 'asc')->get();

    $user = User::where('id', Auth::user()->id)->get();

    $records = Record::where('id', Auth::user()->record_id)->get();

    foreach($records as $record) {
      $title = $record->title;
    }

    return view('mypage', [
      'tasks' => $tasks,
      'user' => $user,
      'title' => $title
    ]);
  }

  public function delete(Task $task)
  {
    $task->delete();

    return redirect('/tasks');
  }
}
