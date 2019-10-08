<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Utils\UserSession;

class UserController extends Controller
{
    public function __construct()
    {
        //
    }

    public function signup()
    {
        return view('signup');
    }
    
    public function signup_post(Request $request)
    {
        $email = $request->input("email");
        $firstname =$request->input("firstname");
        $lastname = $request->input("lastname");
        $password = password_hash($request->input("password"), PASSWORD_DEFAULT);

        $user = new User();
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->email = $email;
        $user->password = $password;

        $user->save();

        return redirect()->route('home');
        
    }

    public function signin()
    {
        return view('signin');
    }
    
    public function signin_post(Request $request)
    {
        $email = $request->input("email");
        $password = $request->input("password");

        $user = User::where('email', $email)->first();
        //dump($user);

        if ($user != NULL)
        {
            //echo "PASSSSSSSSSs";
            if (password_verify($password, $user->password))
            {
                //echo "PASSSSSSSSSs2";
                UserSession::connect($user);
                return redirect()->route('home');
            }
        }
        

        return view('signin');
    
    }

    public function signout()
    {
        UserSession::disconnect();
        return redirect()->route('home');
    }
}