<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    /** @var UserModel */
    protected $users;

    public function __construct()
    {
        $this->users = new UserModel();
    }

    public function index()
    {
        $perPage = (int) (setting('items_per_page', 10));
        $search  = trim((string) $this->request->getGet('q'));

        $builder = $this->users;
        if ($search !== '') {
            $builder = $builder->groupStart()
                ->like('name', $search)
                ->orLike('email', $search)
                ->groupEnd();
        }

        $data = [
            'title'  => 'Users',
            'users'  => $builder->orderBy('id', 'DESC')->paginate($perPage),
            'pager'  => $this->users->pager,
            'search' => $search,
        ];

        return view('users/index', $data);
    }

    public function create()
    {
        return view('users/create', ['title' => 'Create User']);
    }

    public function store()
    {
        $rules = [
            'name'             => 'required|min_length[2]|max_length[100]',
            'email'            => 'required|valid_email|max_length[150]|is_unique[users.email]',
            'password'         => 'required|min_length[6]|max_length[255]',
            'password_confirm' => 'required|matches[password]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->users->insert([
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ]);

        return redirect()->to('/users')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $user = $this->users->find($id);
        if (! $user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('users/edit', [
            'title' => 'Edit User',
            'user'  => $user,
        ]);
    }

    public function update(int $id)
    {
        $user = $this->users->find($id);
        if (! $user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'name'  => 'required|min_length[2]|max_length[100]',
            'email' => "required|valid_email|max_length[150]|is_unique[users.email,id,{$id}]",
        ];

        $password = (string) $this->request->getPost('password');
        if ($password !== '') {
            $rules['password']         = 'min_length[6]|max_length[255]';
            $rules['password_confirm'] = 'required|matches[password]';
        }

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $payload = [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        if ($password !== '') {
            $payload['password'] = $password;
        }

        $this->users->update($id, $payload);

        return redirect()->to('/users')->with('success', 'User berhasil diperbarui.');
    }

    public function delete(int $id)
    {
        if ((int) session('userId') === $id) {
            return redirect()->to('/users')->with('error', 'Tidak dapat menghapus akun yang sedang login.');
        }

        if (! $this->users->find($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $this->users->delete($id);

        return redirect()->to('/users')->with('success', 'User berhasil dihapus.');
    }
}
