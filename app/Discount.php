<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
  protected $table='discount';
  protected $fillable=['discount_price', 'product_id', 'deleted_at'];
}
