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
        'invoice',
        'tracking_number',
        'qr_code',
        'penerima',
        'alamat_penerima',
        'no_penerima',
        'pengirim',
        'no_pengirim',
        'alamat_pengirim',
        'origin_id',
        'destination_id',
        'variantservice_id',
        'berat_total',
        'harga_kg',
        'sub_total',
        'diskon',
        'total',
        'total_bayar',
        'status',
        'satuan',
        'user_id',
    ];

    public function variantservice()
    {
    	return $this->belongsTo(Variantservices::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
