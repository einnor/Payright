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
     * An invoice has many attachments
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachments() {
        return $this->hasMany('App\Attachment');
    }



    public function addAttachment(Attachment $attachment){
        return $this->attachments()->save($attachment);
    }
}
