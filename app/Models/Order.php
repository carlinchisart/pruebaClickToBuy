<?php

namespace App\Models;

use App\Events\CreatedOrderEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['account_id','producto','cantidad','valor','total'];

    protected $dispatchesEvents = [
        'created' => CreatedOrderEvent::class
    ];
}
