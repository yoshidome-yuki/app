<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $fillable = [
        'user_id','comment','temperature','condition','weight','meal','menu','issue','action'
    ];
    
    public function comments(): HasMany
{
    return $this->hasMany('App\Comment');
}
public function user()
{
    return $this->belongsTo('App\User');
}
}
