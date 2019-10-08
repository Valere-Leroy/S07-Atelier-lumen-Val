<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Utils\UserSession;

class QuizController extends Controller
{
    public function __construct()
    {
        //
    }

    public function quiz($id)
    {
        $quiz = Quiz::find($id);
        if (UserSession::isConnected())
        {
            $user_connected = UserSession::getUser();
            //dump($user_connected);
            return view('quiz', [
                'quiz' => $quiz,
                'user_connected' => $user_connected
            ]);
        }
        else
        {
            return view('quiz', ['quiz' => $quiz]);
        }
    }

    public function quiz_post($id, Request $request)
    {
        $result = $request->input();
        $result_checked = [];
        $note = 0;
        $quiz = Quiz::find($id); 

        foreach ($result as $question_id => $answer_id)
        {
            $question = $quiz->questions->find($question_id);
            $correct_answer = $question->answers_id;
            if ($correct_answer == $answer_id)
            {
                $note++;
                $result_checked[$question_id] = 
                [ 'answer_id' => $answer_id,
                   "result"  => "true"
                ];
            }
            else
            {
                $result_checked[$question_id] = 
                [ 'answer_id' => $answer_id,
                   "result"  => "false"
                ];
            }
        }



        
        if (UserSession::isConnected())
        {
            $user_connected = UserSession::getUser();
            //dump($user_connected);
            return view('result', [
                'quiz' => $quiz,
                'note' => $note,
                'result_checked' => $result_checked,
                'user_connected' => $user_connected
            ]);
        }
        else
        {
            return view('quiz', ['quiz' => $quiz]);
        }
    }

}