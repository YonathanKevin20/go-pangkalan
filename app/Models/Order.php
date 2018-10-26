<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    public function client()
    {
    	return $this->belongsTo('App\User','client_id');
    }

    public function driver()
    {
    	return $this->belongsTo('App\User','driver_id');
    }
}
