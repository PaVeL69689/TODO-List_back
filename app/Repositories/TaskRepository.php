<?php

namespace App\Repositories;

use App\Models\Tasks;
use Illuminate\Database\Eloquent\Collection;

    class TaskRepository implements TaskRepositoryInterface
    {
        private $model;

        public function __construct(Tasks $model)
        {
            $this->model = $model;
        }
        public function getTask($id)
        {
            return $this->model->where('id', $id)->first();
        }
        public function getTasks(): Collection
        {
            return $this->model->get();
        }
        public function updateTask($data, $id): Tasks
        {
            $model = $this->model->where('id', $id)->first();
            $model->title = $data['title'];
            $model->description = $data['description'];
            $model->save();
            return $model;
            
        }
        public function deleteTask($id): bool
        {
            return $this->model->where('id', $id)->first()->delete();
        }
        public function createTask(array $data): void
        {

            $this->model->title = $data['title'];
            $this->model->description = $data['description'];
            $this->model->status = false;
            $this->model->save();
        }
    }