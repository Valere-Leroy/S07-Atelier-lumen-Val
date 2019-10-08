<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Tag;
use App\Utils\UserSession;

class TagController extends Controller
{
    public function __construct()
    {
        //
    }

    public function tags()
    {
        $tags = Tag::all();
        //dump(UserSession::getUser());
        if (UserSession::isConnected())
        {
            $user_connected = UserSession::getUser();
            //dump($user_connected);
            return view('tag', [
                'tags' => $tags,
                'user_connected' => $user_connected,
            ]);
        }
        else
        {
            return view('tag', ['tags' => $tags]);
        }   
    }

    public function quizzes($id)
    {
        $tag = Tag::find($id);
        $quizzes = $tag->quizzes->sortBy('title');
        //dump(UserSession::getUser());
        if (UserSession::isConnected())
        {
            $user_connected = UserSession::getUser();
            //dump($user_connected);
            return view('quiz_tag', [
                'quizzes' => $quizzes,
                'user_connected' => $user_connected,
                'tag_name' => $tag->name
            ]);
        }
        else
        {
            return view('quiz_tag', [
                'quizzes' => $quizzes,
                'tag_name' => $tag->name
                ]);
        }   
    }
}