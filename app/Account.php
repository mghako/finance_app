<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'name', 'number', 'balance', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction')->latest();
    }
}