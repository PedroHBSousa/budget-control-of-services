<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'addresses_id'];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
