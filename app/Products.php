<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table='products';
    protected $fillable=['name','description','short_desc','category_id','photo','price','feature'];
}
