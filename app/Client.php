<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $table = 'clients';

    protected $fillable = [
        'user_id',
        'name',
        'service'
    ];

    /**
     * A client has many invoices
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices() {
        return $this->hasMany('App\Invoice');
    }
}
