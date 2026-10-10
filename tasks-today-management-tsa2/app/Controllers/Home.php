<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Home extends BaseController
{
    public function index(): string
    {
        $today = date('Y-m-d');
        $taskModel = new TaskModel();
        $tasks = $taskModel
            ->where('task_date', $today)
            ->where('is_archived', 0)
            ->orderBy('created_at', 'ASC')
            ->findAll();

        return view('home/index', [
            'title' => 'Tasks for Today',
            'tasks' => $tasks,
            'today' => $today,
        ]);
    }
}
