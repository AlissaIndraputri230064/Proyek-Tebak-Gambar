<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizModel extends Model
{
    protected $table = 'quiz';
    protected $primaryKey = 'quiz_id';
    protected $allowedFields = ['level', 'image_id', 'correct_answer'];

    public function getQuizId(){
        return $this->primaryKey;
    }

    public function getQuizByLevel($level)
    {
        return $this->select('quiz.*, image.image_img')
                    ->join('image', 'quiz.image_id = image.image_id')
                    ->where('quiz.level', $level)
                    ->first();
    }

    public function getLevels()
    {
        return $this->select('level')->orderBy('level', 'ASC')->findAll();
    }
}
