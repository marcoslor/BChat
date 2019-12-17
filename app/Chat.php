<?php

namespace App;

use App\Events\MessageSent;
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

    /**
     * Returns the chat url.
     *
     * @return string
     */
    public function url()
    {
        return '/chats/'.$this->id;
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'chat_users');
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function addUser($user){
        $this->users()->syncWithoutDetaching(User::find($user));
    }

    public function addMessage($body, $user_id){
        /** @var Message $message */
        $message = $this->messages()->create(['body'=>$body, 'user_id'=>$user_id]);

        broadcast(new MessageSent($message));
        return $message;
    }

    public function addTask($body){
        return $this->tasks()->create(compact('body'));
    }
}
