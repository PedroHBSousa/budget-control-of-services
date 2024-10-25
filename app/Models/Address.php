<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['street', 'number', 'city', 'state', 'zip'];

    public function customer()
    {
        return $this->hasMany(Customer::class);
    }
}
