<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'number', 'balance', 'user_id'
    ];
    protected $casts = [
        'status' => 'boolean',
    ];
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction')->latest();
    }
    
    public function toggleStatus() {
        $this->status = !$this->status;
    }

    // public function disable() {
    //     return $this->status = 'disable';
    // }
    // public function enable() {
    //     return $this->status = 'active';
    // }
}