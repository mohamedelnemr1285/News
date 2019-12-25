<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    public function post()
    {
        return $this->belongsTo(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
