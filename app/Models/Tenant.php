<?php

namespace App\Models;

use App\Events\PrepareTenantDBEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug' , 'renew_date'];

    protected $dispatchesEvents = [
        'saved' => PrepareTenantDBEvent::class,
    ];
}
