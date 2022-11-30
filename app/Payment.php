<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table = 'payment';
    protected $fillable = ['userid',
        'invoiceNo',
        'product_id',
        'amount',
        'counts',
        'pay_name',
        'phone',
        'email',
        'address',
        'country',
        'state',
        'city',
        'tran_id',
        'status',
        'bank_name'
    ];
    public function user() {
        return $this->belongsTo('App\User','userid');
    }
    public function product() {
        return $this->belongsTo('App\Products','product_id');
    }
}
