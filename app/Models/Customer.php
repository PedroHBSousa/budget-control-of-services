<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'user_id', 'addresses_id'];

    public function address()
    {
        return $this->belongsTo(Address::class, 'addresses_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
