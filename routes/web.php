<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$router->get('/', ['as' => 'home', 
'uses' => 'MainController@home'
]);

$router->get('/signup', ['as' => 'signup', 
'uses' => 'UserController@signup'
]);

$router->post('/signup', ['as' => 'signup_post', 
'uses' => 'UserController@signup_post'
]);

$router->get('/signin', ['as' => 'signin', 
'uses' => 'UserController@signin'
]);

$router->post('/signin', ['as' => 'signin_post', 
'uses' => 'UserController@signin_post'
]);

$router->get('/signout', ['as' => 'signout', 
'uses' => 'UserController@signout'
]);

$router->get('/quiz/{id}', ['as' => 'quiz', 
'uses' => 'QuizController@quiz'
]);