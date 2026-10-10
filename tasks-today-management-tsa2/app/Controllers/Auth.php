<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(site_url('tasks'));
        }

        return view('auth/login', ['title' => 'Log in']);
    }

    public function authenticate(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        $rules = ['username' => 'required', 'password' => 'required'];
        if (! $this->validate($rules)) {
            return view('auth/login', ['title' => 'Log in', 'validation' => $this->validator]);
        }

        $user = (new UserModel())->where('username', trim((string) $this->request->getPost('username')))->first();
        if (! $user || ! password_verify((string) $this->request->getPost('password'), $user['password'])) {
            return view('auth/login', ['title' => 'Log in', 'error' => 'The username or password is incorrect.']);
        }

        session()->regenerate(true);
        session()->set(['isLoggedIn' => true, 'userId' => $user['id'], 'username' => $user['username']]);
        $destination = session()->getFlashdata('redirect_after_login') ?: site_url('tasks');
        return redirect()->to($destination)->with('message', 'You are now logged in.');
    }

    public function logout(): \CodeIgniter\HTTP\RedirectResponse
    {
        session()->destroy();
        return redirect()->to(site_url('login'))->with('message', 'You have been logged out.');
    }
}
