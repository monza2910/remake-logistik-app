<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'transactions';
    protected $fillable = [
        'tracking_number',
        'sender',
        'phone_sender',
        'address_sender',
        'penerima',
        'phone_penerima',
        'address_penerima'
    ];
}
