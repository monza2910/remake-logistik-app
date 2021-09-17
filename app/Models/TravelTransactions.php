<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelTransactions extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'user_id',
        'invoice',
        'qrcode',
        'nama_penumpang',
        'alamat_penumpang',
        'no_penumpang',
        'alamat_penjemputan',
        'alamat_pemberhentian',
        'origin_id',
        'destination_id',
        'subtotal',
        'diskon',
        'total', 
        'status',
        'tgl_berangkat',
        'jam_berangkat',
        'dibayar',
        'travel_id', 
    ];

    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
