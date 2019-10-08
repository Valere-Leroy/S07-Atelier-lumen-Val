<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Question extends Model
{
    protected   $table = "questions";

    public function answer()
    {
        return $this->hasMany('App\Models\Answer');
    }
    public function level()
    {
        return $this->belongsTo('App\Models\Level', 'levels_id');
    }
}