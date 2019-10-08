<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Level extends Model
{
    protected   $table = "levels";

    public function answer()
    {
        return $this->hasMany('App\Models\Question', 'level_id');
    }    
    public function getCssName()
    {
        switch($this->id) {
            case 1:
                return 'beginner';
            case 2:
                return 'medium';
            case 3:
                return 'expert';    
        }
    }
}