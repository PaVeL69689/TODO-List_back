<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Services\TasksService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private $taskService;

    public function __construct(TasksService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function getTasks(Request $request)
    {
        $tasks = $this->taskService->getTasks();
        return view('page.todo', compact('tasks'));
    }
    public function getTask(Request $request)
    {
        
        $task = $this->taskService->getTask($request->id);

        return view('page.task', compact('task'));

    }
    public function createTask(TaskRequest $request)
    {
        $validated = $request->validated();
        $this->taskService->createTask($validated);
        return redirect('/tasks');
    }
    public function updateTask(TaskRequest $request)
    {
        $validated = $request->validated();
        $this->taskService->updateTask($validated, $request->id);
        return redirect('/tasks');
    }
    public function deleteTask(Request $request)
    {
        $this->taskService->deleteTask($request->id);
        return redirect('/tasks');
    }
}
