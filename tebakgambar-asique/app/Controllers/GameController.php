<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\QuizModel;
use App\Models\RecordsModel;
use CodeIgniter\Controller;

class GameController extends Controller
{
    protected $userModel;
    protected $quizModel;
    protected $recordsModel;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->userModel = new UserModel();
        $this->quizModel = new QuizModel();
        $this->recordsModel = new RecordsModel();
    }

    public function tambahSoal()
    {
        return view('admin/tambah_soal');
    }

    public function levels()
    {
        if (!session()->has('loggedInUser')) {
            return redirect()->to('auth/login');
        }

        $userId = session()->get('user_id');
        $user = $this->userModel->find($userId);
        $record = $this->recordsModel->where('user_id', $userId)->first();
        $currentLevel = $record['current_level'];

        $levels = [];
        for ($i = 1; $i <= 10; $i++) {
            $levels[] = [
                'level' => $i,
                'accessible' => $i <= $currentLevel 
            ];
        }

        return view('game/bermain_level', ['levels' => $levels]);
    }

    public function play($levelNumber)
    {
        if (!session()->has('loggedInUser')) {
            return redirect()->to('login');
        }
    
        $userId = session()->get('user_id');
        $record = $this->recordsModel->where('user_id', $userId)->first();
        $currentLevel = $record['current_level'];
    
        /*if ($levelNumber > $currentLevel) {
            return redirect()->to('game/bermain_level');
        }*/
    
        $quiz = $this->quizModel->getQuizByLevel($levelNumber);
        $imageData = base64_encode($quiz['image_img']);
        $quiz['image_base64'] = 'data:image/jpeg;base64,' . $imageData;

        $isReplay = $levelNumber < $currentLevel;
    
        return view('game/bermain', ['quiz' => $quiz, 'levelNumber' => $levelNumber, 'isReplay' => $isReplay]);
    }

    public function checkAnswer($levelNumber)
    {
        if (!session()->has('loggedInUser')) {
            return redirect()->to('login');
        }
    
        $userId = session()->get('user_id');
        $user = $this->userModel->find($userId);
        $record = $this->recordsModel->where('user_id', $userId)->first();
        $currentLevel = $record['current_level'];
        $quiz = $this->quizModel->getQuizByLevel($levelNumber);
    
        $answer = strtoupper($this->request->getPost('answer'));
        $correctAnswer = strtoupper($quiz['correct_answer']);

        $isReplay = $levelNumber < $currentLevel;
        
        if ($answer === $correctAnswer) {
            $nextLvl=$levelNumber+1;
            if (!$isReplay) {
                $newLevel = $currentLevel + 1;
                $newScore = $record['score'] + 10;
                
                $nextQuiz = $this->quizModel->getQuizByLevel($newLevel);

                if ($nextQuiz) {
                    $nextQuizId = $nextQuiz['quiz_id'];
                    $this->recordsModel->updateRecord($userId, $nextQuizId, $newLevel, $newScore);
                } else {
                    return redirect()->to('game/levels')->with('error', 'Quiz untuk level berikutnya tidak ditemukan.');
                }
            }
            
            return redirect()->to(base_url('game/benar/' . $nextLvl));
        } else {
            return redirect()->to(base_url('game/salah/' . $levelNumber));
        }
    }

    public function correct($newLevel)
    {
        return view('game/benar', [
            'newLevel' => $newLevel
        ]);
    }

    public function wrong($levelNumber)
    {
        return view('game/salah', ['levelNumber' => $levelNumber]);
    }

    public function store()
    {
        $validated = $this->validate([
            'quiz_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Id quiz tidak boleh kosong'
                ]
            ],
            'image_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Id gambar tidak boleh kosong'
                ]
            ],
            'correct_answer' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jawaban benar tidak boleh kosong'
                ]    
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Id quiz tidak boleh kosong'
                ]
            ]
        ]);

        if (!$validated)
        {
            return view('admin/tambah_soal', ['validation' => $this->validator]);
        }

        $quizModel = new QuizModel();

        $quizId = $this->request->getPost('quiz_id');
        $imageId = $this->request->getPost('image_id');
        $correctAnswer = $this->request->getPost('correct_answer');
        $level = $this->request->getPost('level');

        $data = [
            'quiz_id' => $quizId,
            'image_id' => $imageId,
            'correct_answer' => $correctAnswer,
            'level' => $level
        ];

        $query = $quizModel->insert($data);

        if (!$query) 
        {
            return redirect()->to('admin/home_admin')->with('success', 'Gambar berhasil diunggah!');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data gambar.');
        }
    }
}
