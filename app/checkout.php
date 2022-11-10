<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
    //
    protected $table='checkout';
    protected $fillable=['productid','userid','counts','status','price'];

}
