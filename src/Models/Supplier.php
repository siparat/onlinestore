<?php

namespace Vendor\OnlineStore\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name', 'contact_email'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
