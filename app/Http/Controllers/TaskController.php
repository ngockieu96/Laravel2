<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Http\Requests\Requestname;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TaskController extends Controller
{
  /**
     * [index task]
     * @return [type] [description]
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'asc') -> get();              
       
        return view('tasks')->with([
        'tasks' => $task,
        ]);
    }

    /**
     * [store task]
     * @param  Requestname $request [description]
     * @return [type]               [description]
     */
    public function store(Requestname $request)
    {
        $task = new Task;
        $task->name = $request->name;

        if ( $task->save()) {
            Session::flash('message', trans('messages.create_task_success'));
            
            return redirect()->route('task.index');
        } else {
            Session::flash('message', trans('messages.create_task_fail'));
            
            return back();
        }
    }

    /**
     * [destroy task]
     * @param  Task   $task [description]
     * @return [type]       [description]
     */
    public function destroy(Task $task)
    {
        if ( $task->delete()) {           
           Session::flash('message', trans('messages.delete_task_success'));
           
           return redirect()->route('task.index');
        } else {  
            Session::flash('message', trans('messages.delete_task_fail'));

            return back();
        }
    }     
}
