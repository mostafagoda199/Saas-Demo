<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{

    protected $table = 'order_product';

    protected $fillable = ['product_id', 'order_id','qty','total_amount'];
}
