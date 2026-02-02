<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function getTasks(Request $request)
    {
        $tasks = Tasks::get();
        return view('page.todo', compact('tasks'));
    }
    public function getTask(Request $request)
    {
        $task = Tasks::where('id', $request->id)->first();

        return $task;

    }
    public function createTask(Request $request)
    {
        $model = new Tasks();
        $model->title = $request->title;
        $model->description = $request->description;
        $model->status = false;
        $model->save();
        return redirect('/tasks');
    }
    public function updateTask(Request $request)
    {
        
    }
    public function deleteTask(Request $request)
    {

    }
}
