<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RecordsModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    protected $userModel;
    protected $recordModel;

    public function __construct()
    {
        helper(['url', 'link']);
        $this->userModel = new UserModel();
        $this->recordModel = new RecordsModel();
    }

    public function profile($userId)
    {
        if (!session()->has('loggedInUser')) {
            return redirect()->to('login');
        }

        $userId = session()->get('user_id');
        $user = $this->userModel->find($userId);

        $userRecord = $this->recordModel->getUserRecord($userId); // Mengambil data level dan score
        if (!$userRecord) {
            $recentLevel = 0;
            $score = 0;
        } else {
            $recentLevel = $userRecord['current_level'];
            $score = $userRecord['score'];
        }

        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $this->userModel->update($userId, ['username' => $username]);

            session()->setFlashdata('success', 'Profile updated successfully!');
            return redirect()->to('profile');
        }

        $userModel = new UserModel();

        // Ambil data pengguna berdasarkan ID
        $user = $userModel->find($userId);

        if (!$user) {
            // Jika pengguna tidak ditemukan
            return redirect()->to('/')->with('error', 'Pengguna tidak ditemukan');
        }

        return view('profile', [
            'user' => $user,
            'recentLevel' => $recentLevel,
            'score' => $score
        ]);
    }

    /*public function record($quizId, $level, $score)
    {
        $userId = session()->get('user_id');

        if (!$this->recordModel->getRecord($userId, $quizId)) {
            $this->recordModel->createRecord($userId, $quizId);
        } else {
            $this->recordModel->updateRecord($userId, $quizId, $level, $score);
        }

        return redirect()->to('record');
    }*/

    public function deleteAccount()
    {
        $session = session();
        $userId = $session->get('user_id');
    
        if (!$userId) {
            return redirect()->to('auth/login');
        }
    
        // Hapus data terkait (misalnya data di tabel 'records')
        $this->recordModel->where('user_id', $userId)->delete();
    
        // Hapus akun pengguna
        if ($this->userModel->delete($userId)) {
            $session->destroy(); // Hapus session
            return redirect()->to('/')->with('message', 'Account deleted successfully.');
        }
    
        return redirect()->to('/page/profile')->with('error', 'Failed to delete account.');
    }

    public function display_form_errors($validation, $field)
    {
        return $validation->hasError($field) ? $validation->getError($field) : '';
    }

    public function showEditProfile()
{
    $session = session();
    $userId = $session->get('user_id');

    if (!$userId) {
        return redirect()->to('/login');
    }

    $user = $this->userModel->find($userId);

    return view('page/edit_profile', ['user' => $user]);
}

public function editProfile()
{
    $session = session();
    $userId = $session->get('user_id');

    if (!$userId) {
        return redirect()->to('/login');
    }

    $updateData = [
        'user_name' => $this->request->getPost('user_name'),
        'user_email' => $this->request->getPost('user_email'),
    ];

    if ($this->request->getPost('user_password')) {
        $updateData['user_password'] = password_hash($this->request->getPost('user_password'), PASSWORD_DEFAULT);
    }

    $this->userModel->update($userId, $updateData);

    $session->setFlashdata('success', 'Profile updated successfully.');

    return redirect()->to('page/profile');
}


}

    
