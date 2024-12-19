<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\QuizModel;
use App\Models\RecordsModel;

class Page extends BaseController
{
    protected $userModel;
    protected $quizModel;
    protected $recordsModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->quizModel = new QuizModel();
        $this->recordsModel = new RecordsModel();
    }

    public function home() 
    {
        $userName = session()->get('user_name');
        return view('page/home', ['user_name'=>$userName]);
    }

    public function profile() 
    {
        if (!session()->has('loggedInUser')) {
            return redirect()->to('login');
        }
    
        $userId = session()->get('user_id');
        $user = $this->userModel->find($userId);

    
        return view('page/profile', [
            'user' => $user
        ]);
    }

    public function editProfile() 
    {
        return view('page/edit_profile');
    }

    public function record() 
    {
        if (!session()->has('loggedInUser')) {
            return redirect()->to('login');
        }
        
    
        $userId = session()->get('user_id');
        $user = $this->userModel->find($userId);
        $records = $this->recordsModel->where('user_id', $userId)->first();

    
        return view('page/record', [
            'records' => $records,
            'user' => $user
        ]);
    }
}
