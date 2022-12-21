<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    //
    protected $table='locations';
    protected $fillable=['branch_name', 'address', 'phone_number'];
}
