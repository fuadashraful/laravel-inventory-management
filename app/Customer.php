<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=[
        'name','email','phone','address','photo','shop_name','account_number','bank_name','bank_branch','city'
    ];
}
