<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table='chats';
    public $timestamp=true;
    protected $flexible=[
        'sender',
        'reciever'
        ,'message',


    ];

}
