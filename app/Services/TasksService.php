<?php

namespace App\Services;

use App\Models\Tasks;
use App\Repositories\TaskRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TasksService
{
    /**
     * Create a new class instance.
     */

    private $taskRepository;
    
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function createTask($data): null
    {
        return $this->taskRepository->createTask($data);
    }
    public function getTasks(): Collection
    {
        return $this->taskRepository->getTasks();
    }
    public function getTask($id): Tasks
    {
        return $this->taskRepository->getTask($id);
    }
    public function updateTask(array $data, $id): Tasks
    {
        return $this->taskRepository->updateTask($data, $id);
    }

    public function deleteTask($id): bool
    {
        return $this->taskRepository->deleteTask($id);
    }
}
