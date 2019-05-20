<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function getTask(){
        $tasks = Task::all();
        $columns = [
            'id',
            'user_name'
        ];
        $users = User::get($columns);
        \Debugbar::info($users);
        \Debugbar::info($tasks);
        return view('tasks', [
            'tasks' => $tasks ,
            'users' => $users ,
            ]);
    }


    public function postTask(Request $request){
        $validator = \Validator::make($request->all(), [
            'task_sentence' => 'required|max:255',
        ]);
        if($validator->fails()){
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        dd($request);
        $task = new task;
        $task->task_id = $request->id;
        $task->task_sentence = $request->task_sentence;
        $task->time_limit = $request->time_limit;
        //todo This get by login infomation
        $task->user_id = Auth::id();
        $task->task_status = 0;
        $task->save();
        return redirect('/');
    }

    public function deleteTask(Task $task){
        $task->delete();
        return redirect('/');
    }
}
