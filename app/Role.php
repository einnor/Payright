<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['user_id','role'];

    /**
     * A user is has of one role
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function users() {
        return $this->hasMany('App\User');
    }
}
