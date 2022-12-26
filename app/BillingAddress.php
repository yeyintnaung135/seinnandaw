<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{
    //
    protected $table='billing_address';
    protected $fillable=['user_id','first_name','last_name','company_name','country','street','apartment','city','state','postcode','phone','email'];
}
