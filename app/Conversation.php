<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    //
    public $timestamps = false;
    protected $primaryKey = 'cid';
    public function user()
    {
        
        return $this->hasMany('App\ConversationsReply','cid');
    }

}
