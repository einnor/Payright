<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;



class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'invoice_id',
        'user_id',
        'comment',
    ];

    /**
     * A comment belongs to an invoice
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice(){
        return $this->belongsTo('App\Invoice');
    }


    /**
     * A comment belongs to a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\User');
    }


    public function setAttributes($comment, $user_id){

        $this->user_id = $user_id;

        $this->comment = $comment;

    }
}
