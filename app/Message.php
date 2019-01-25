<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;
    protected $fillable = ['message'];
    protected $dates = ['deleted_at'];
    public $id;
    public $message;
    public $email;
    public $name;
    protected $table = 'messages';
}
