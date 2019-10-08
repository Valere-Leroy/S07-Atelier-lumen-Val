<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Utils\UserSession;

class MainController extends Controller
{
    public function __construct()
    {
        //
    }

    public function home()
    {
        $quizzes = Quiz::all();
        //dump(UserSession::getUser());
        if (UserSession::isConnected())
        {
            $user_connected = UserSession::getUser();
            //dump($user_connected);
            return view('home', [
                'quizzes' => $quizzes,
                'user_connected' => $user_connected
            ]);
        }
        else
        {
            return view('home', ['quizzes' => $quizzes]);
        }

        
    }

}