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

    public function profil()
    {
        if (UserSession::isConnected())
        {
            $user_connected = UserSession::getUser();
            //dump($user_connected);
            return view('profil', [
                'user_connected' => $user_connected,
            ]);
        }
        else
        {
            return redirect()->route('home');
        }   
    }
    
    public function profil_post(Request $request)
    {
        //dump($request);
        if (UserSession::isConnected()) {

            // Si l'utilisateur est connecté, on peut le récupérer dans $user
            $user_connected = UserSession::getUser();
            //dump($user);
        } else {
            $user_connected = null;
        } 
        $email = $request->input("email");
        $firstname =$request->input("firstname");
        $lastname = $request->input("lastname");
        $new_password = password_hash($request->input("new_password"), PASSWORD_DEFAULT);
        $password = $request->input("password");
    
        if (empty($password))
        {
            $alert = "Veuillez entrer votre mot de passe.";
            //dump($user_connected);
            return view('profil', [
                'alert' => $alert,
                'user_connected' => $user_connected
            ]);
        }
        else
        {
            if (password_verify($password, $user_connected->password))
            {
                if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $user_connected->email = $email;
                }
                if (!empty($firstname))
                {
                    $user_connected->firstname = $firstname;
                }
                if (!empty($lastname))
                {
                    $user_connected->lastname = $lastname;
                }
                if (!empty($new_password))
                {
                    $user_connected->password = $new_password;
                }
                $user_connected->save();
                $alert = "Modification bien prise en compte.";
                //dump($user_connected);
                return view('profil', [
                    'alert' => $alert,
                    'user_connected' => $user_connected
                ]);
            }
            else
            {
                $alert = "Mot de passe incorrect, tocar.";
                //dump($user_connected);
                return view('profil', [
                    'alert' => $alert,
                    'user_connected' => $user_connected
                ]);
            }
        }   
    }
}