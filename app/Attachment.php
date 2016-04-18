<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Attachment extends Model
{


    protected $table = 'invoice_attachments';

    protected $fillable = [
        'invoice_id',
        'user_id',
        'name',
        'path',
        'thumbnail_path'
    ];



    public function invoice(){
        return $this->belongsTo('App\Invoice');
    }



    /**
     * An attachment belongs to a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\User');
    }


    public function baseDir(){

        return 'images/attachments';

    }


    public function setNameAttribute($name){

        $this->attributes['name'] = $name;

        $this->path = $this->baseDir() . '/' . $name;

        $this->thumbnail_path = $this->baseDir() . '/tn-' . $name;

        $this->user_id = Auth::user()->id;

    }
}
