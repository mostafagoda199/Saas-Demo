<?php

namespace App\Models\Tenant;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','slug',
        'created_by','unit_id','currency_id','qty','price','product_image'];

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)->using(OrderProduct::class)->withPivot('qty','total_amount');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}
