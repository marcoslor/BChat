<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description'
    ];

    public function url()
    {
        return 'chats/'.$this->id;
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'chat_users');
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function addUser($user){
        $this->users()->syncWithoutDetaching(User::find($user));
    }

}
