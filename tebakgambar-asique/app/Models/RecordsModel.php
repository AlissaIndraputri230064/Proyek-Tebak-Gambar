<?php

namespace App\Models;

use CodeIgniter\Model;

class RecordsModel extends Model
{
    protected $table = 'records';
    protected $primaryKey = 'quiz_id';
    protected $allowedFields = ['user_id', 'quiz_id', 'current_level', 'score'];

    public function getRecord($userId, $quizId)
    {
        return $this->where(['user_id' => $userId, 'quiz_id' => $quizId])->first();
    }

    public function getUserRecord($userId)
    {
        return $this->where('user_id', $userId)
                    ->orderBy('quiz_id', 'DESC')
                    ->first(); 
    }

    public function updateRecord($userId, $quizId, $newLevel, $newScore)
    {
        return $this->where(['user_id' => $userId])
                    ->set(['quiz_id' => $quizId,
                           'current_level' => $newLevel,
                           'score' => $newScore,])
                    ->update();
    }

    public function createRecord($userId, $quizId)
    {
        return $this->insert([
            'user_id' => $userId,
            'quiz_id' => $quizId,
            'current_level' => 1,
            'score' => 0,
        ]);
    }
}
