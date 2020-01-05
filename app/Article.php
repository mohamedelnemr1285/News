<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $guarded = [];

    public function User(){

        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(like::class);
    }

    public function scopeSearch($query,$search)
    {
        return $query
            ->where('article', 'LIKE', "%$search%")
           ->orwhere('news','LIKE',"%$search%")->paginate(10);
       }
}
