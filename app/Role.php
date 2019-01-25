<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public $incrementing = false;
    public function users(){
        return $this->belongsToMany('Users', 'user_roles', 'Role_id', 'id');
    }
}
