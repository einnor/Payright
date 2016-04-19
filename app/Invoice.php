<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';

    protected $fillable = [
        'user_id',
        'client_id',
        'particular',
        'amount'
    ];

    /**
     * An invoice belongs to a client
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client() {
        return $this->belongsTo('App\Client');
    }


    /**
     * An invoice belongs to a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\User');
    }


    /**
     * An invoice has many attachments
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachments() {
        return $this->hasMany('App\Attachment');
    }


    /**
     * An invoice has many comments
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments() {
        return $this->hasMany('App\Comment');
    }


    /**
     * add an attachment to an invoice
     * @param Attachment $attachment
     * @return Model
     */
    public function addAttachment(Attachment $attachment){
        return $this->attachments()->save($attachment);
    }


    /**
     * add a comment to an invoice
     * @param Comment $comment
     * @return Model
     */
    public function addComment(Comment $comment){
        return $this->comments()->save($comment);
    }
}
