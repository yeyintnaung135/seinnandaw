<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    //

    use SoftDeletes;
    protected $table='products';
    protected $fillable=['name',
        'photo_one',
        'photo_two',
        'photo_three',
        'photo_four',
        'subcategory',
        'description','short_desc','category_id','photo','price','feature','new_arrival','deleted_at'];
        
        public function category() {
            return $this->belongsTo('App\Categories','category_id');
        }
        public function discount() {
          return $this->hasOne('App\Discount','product_id');
        }
}
