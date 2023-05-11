<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment',
        'diary_id',
        'user_id',
    ];

    public function diary()
    {
        return $this->belongsTo('App\Diary');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
