<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id', 'pic', 'title', 'content'
        ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function likes(){
        return $this->morphToMany(User::class, 'likables');
    }
}
