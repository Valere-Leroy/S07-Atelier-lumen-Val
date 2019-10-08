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

}