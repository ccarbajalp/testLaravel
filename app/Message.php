<?php

namespace App;

use App\Presenters\MessagePresenter;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Note;

class Message extends Model
{
    protected $fillable = ['nombre', 'email', 'mensaje'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function note(){
        return $this->morphOne(Note::class, 'notable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }

    public function present(){
        return new MessagePresenter($this);
    }

}
