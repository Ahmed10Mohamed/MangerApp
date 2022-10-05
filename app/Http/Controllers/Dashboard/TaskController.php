<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Group;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
   public function index(Request $request){
      $tasks = Task::query();

      if ($request->has('user') && $request->user != '0') {
        $tasks->where('user', $request->user);
      }

      if ($request->has('group') && $request->group != '0') {
        $tasks->where('group', $request->group);
      }

    $tasks = $tasks->orderBy('id', 'DESC')->get();
    // user type admin
    $users = Client::orderBy('id', 'DESC')->get();
    $groups = Group::orderBy('id', 'DESC')->get();

    return view('admin.pages.tasks.index',compact('tasks','users','groups'));
   }
   public function show($id){
    $task = Task::findOrfail($id);
    return view('admin.pages.tasks.show',compact('task'));
   }
   public function delete_task($id){
    $task = Task::findOrfail($id);
    $task->delete();
    return redirect()->back();
   }
}
