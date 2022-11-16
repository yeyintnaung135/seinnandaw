<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table='products';
    protected $fillable=['name',
        'photo_one',
        'photo_two',
        'photo_three',
        'photo_four',
        'subcategory',
        'description','short_desc','category_id','photo','price','feature'];
}
