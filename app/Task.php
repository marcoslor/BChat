<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'chat_id',
    ];

    public function chat(){
        return $this->belongsTo(Chat::class);
    }

}
