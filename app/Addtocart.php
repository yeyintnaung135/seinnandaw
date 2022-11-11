<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addtocart extends Model
{
    //
    protected $table='addtocart';
    protected $fillable=['userid','product_id','count'];
}
