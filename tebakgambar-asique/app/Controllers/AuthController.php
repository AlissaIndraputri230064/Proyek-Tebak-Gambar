<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RecordsModel;
use App\Models\QuizModel;
use App\Libraries\Hash;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function __construct() 
    {
        helper(['url', 'form']);
    }

    public function login() 
    {
        return view('auth/login');
    }

    public function register() 
    {
        return view('auth/register');
    }

    public function registerUser()
    {
        $validated = $this->validate([
            'user_email' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'Email tidak boleh kosong'
                ]
            ],
            'user_name' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'Username tidak boleh kosong'
                ]
            ],
            'user_password' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'Password tidak boleh kosong'
                ]
            ],
            'confirm_password' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'Password tidak sama'
                ]
            ],
        ]);


        
        if(!$validated) 
        {
            return view('auth/register', ['validation' => $this->validator]);
        }

        $user_name = $this->request->getPost('user_name');
        $user_email = $this->request->getPost('user_email');
        $user_password = $this->request->getPost('user_password');
        $confirm_password = $this->request->getPost('confirm_password');

        $data = [
            'user_name' => $user_name,
            'user_email' => $user_email,
            'user_password' => Hash::encrypt($user_password)
        ];

        $userModel = new UserModel();
        $query = $userModel->insert($data);
        $userId=$userModel->insertID();
        $quizModel= new QuizModel();
        $quiz_id = $quizModel->where('quiz_id', 'L01')->select('quiz_id')->first();
        $recordData = [
            'user_id' => $userId,
            'quiz_id' => $quiz_id,
            'score' => 0,
            'current_level' => 1
        ];
        
        $recordsModel = new RecordsModel();
        $query2=$recordsModel->insert($recordData);

        if (!$query&&!$query2)
        {
            return redirect()->back()->with('fail', 'Gagal menyimpan user');
        } else {
            return redirect()->back()->with('success', 'Berhasil menyimpan user. Silakan login.');
        }
    }

    public function loginUser()
    {
        $validated = $this->validate([
            'user_email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email tidak boleh kosong',
                    'valid_email' => 'Email harus valid'
                ]
            ],
            'user_password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong'
                ]
            ]
        ]);

        if (!$validated) {
            return view('auth/login', [
                'validation' => $this->validator
            ]);
        }

        $user_email = $this->request->getPost('user_email');
        $user_password = $this->request->getPost('user_password');

        $userModel = new UserModel();

        $userInfo = $userModel->where('user_email', $user_email)->first();

        if (!$userInfo) {
            session()->setFlashdata('fail', 'Email tidak ditemukan');
            return redirect()->to('auth/login')->withInput();
        }

        $checkPassword = password_verify($user_password, $userInfo['user_password']);

        if (!$checkPassword) {
            session()->setFlashdata('fail', 'Password tidak sesuai');
            return redirect()->to('auth/login')->withInput();
        }

        $sessionData = [
            'user_id' => $userInfo['user_id'],
            'user_email' => $userInfo['user_email'],
            'user_name' => $userInfo['user_name'],
            'role' => $userInfo['role'],
            'loggedInUser' => true,
        ];
        session()->set($sessionData);

        if ($userInfo['role'] == UserModel::ROLE_ADMIN) {
            return redirect()->to('admin/home_admin');
        } else {
            return redirect()->to('page/home');
        }
    }


    public function logout()
    {
        session()->destroy();

        return redirect()->to('auth/login');
    }

}
