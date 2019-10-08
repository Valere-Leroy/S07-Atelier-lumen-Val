<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Quiz extends Model
{
    protected   $tables = "quizzes";


    public function appUsers()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function question()
    {
        return $this->hasMany('App\Models\Question', 'quizzes_id');
    }
    public function tag()
    {
        return $this->belongsToMany('App\Models\Tag', 'quizzes_has_tags', 'quizzes_id', 'tags_id');
    }
}