<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index(): string
    {
        $taskModel = new TaskModel();
        $tasks = $taskModel
            ->where('is_archived', 0)
            ->orderBy('task_date', 'ASC')
            ->orderBy('created_at', 'ASC')
            ->findAll();

        return view('tasks/index', [
            'title' => 'Task List',
            'tasks' => $tasks,
        ]);
    }

    public function new(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        if (! $this->isAuthenticated()) {
            return redirect()->to(site_url('login'))->with('redirect_after_login', site_url('tasks/new'));
        }

        return view('tasks/form', [
            'title' => 'New Task',
            'task' => ['title' => '', 'status' => 'pending', 'task_date' => ''],
            'formAction' => site_url('tasks'),
            'formHeading' => 'Create a new task',
        ]);
    }

    public function create(): \CodeIgniter\HTTP\RedirectResponse|string
    {
        if (! $this->isAuthenticated()) {
            return redirect()->to(site_url('login'));
        }

        $rules = ['title' => 'required|max_length[150]', 'task_date' => 'required|valid_date[Y-m-d]'];
        if (! $this->validate($rules)) {
            return view('tasks/form', [
                'title' => 'New Task',
                'task' => $this->request->getPost(),
                'formAction' => site_url('tasks'),
                'formHeading' => 'Create a new task',
                'validation' => $this->validator,
            ]);
        }

        (new TaskModel())->insert([
            'title' => trim((string) $this->request->getPost('title')),
            'status' => $this->request->getPost('status') ?: 'pending',
            'task_date' => $this->request->getPost('task_date'),
            'created_at' => date('Y-m-d H:i:s'),
            'is_archived' => 0,
        ]);

        return redirect()->to(site_url('tasks'))->with('message', 'Task created successfully.');
    }

    public function edit(int $id): string|\CodeIgniter\HTTP\RedirectResponse
    {
        if (! $this->isAuthenticated()) {
            return redirect()->to(site_url('login'))->with('redirect_after_login', site_url("tasks/{$id}/edit"));
        }

        $task = (new TaskModel())->where('is_archived', 0)->find($id);
        if (! $task) {
            return redirect()->to(site_url('tasks'))->with('error', 'Task not found.');
        }

        return view('tasks/form', [
            'title' => 'Edit Task',
            'task' => $task,
            'formAction' => site_url("tasks/{$id}"),
            'formHeading' => 'Edit task',
        ]);
    }

    public function update(int $id): \CodeIgniter\HTTP\RedirectResponse|string
    {
        if (! $this->isAuthenticated()) {
            return redirect()->to(site_url('login'));
        }

        $rules = ['title' => 'required|max_length[150]', 'task_date' => 'required|valid_date[Y-m-d]'];
        if (! $this->validate($rules)) {
            return view('tasks/form', [
                'title' => 'Edit Task',
                'task' => array_merge(['id' => $id], $this->request->getPost()),
                'formAction' => site_url("tasks/{$id}"),
                'formHeading' => 'Edit task',
                'validation' => $this->validator,
            ]);
        }

        (new TaskModel())->update($id, [
            'title' => trim((string) $this->request->getPost('title')),
            'status' => $this->request->getPost('status') ?: 'pending',
            'task_date' => $this->request->getPost('task_date'),
        ]);

        return redirect()->to(site_url('tasks'))->with('message', 'Task updated successfully.');
    }

    public function archive(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        if (! $this->isAuthenticated()) {
            return redirect()->to(site_url('login'));
        }

        (new TaskModel())->update($id, ['is_archived' => 1]);
        return redirect()->to(site_url('tasks'))->with('message', 'Task archived.');
    }

    private function isAuthenticated(): bool
    {
        return (bool) session()->get('isLoggedIn');
    }
}
