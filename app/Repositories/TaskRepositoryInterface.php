<?php

namespace App\Repositories;

interface TaskRepositoryInterface
{
    public function getTasks();
    public function getTask($id);
    public function updateTask(array $data, $id);
    public function deleteTask($id);
    public function createTask(array $data);
}