<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArmadaTransaction extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'invoice',
        'qr_code',
        'penyewa',
        'alamat_penyewa',
        'no_penyewa',
        'tgl_berangkat',
        'tgl_kembali',
        'lama_sewa',
        'sub_total',
        'diskon',
        'total',
        'total_bayar',
        'status',
        'user_id'
    ];



    public function armadadetail(){
        return $this->hasMany(ArmadaDetail::class);
    }

    public function origin()
    {
    	return $this->belongsTo(Origins::class);
    }
    public function destination()
    {
    	return $this->belongsTo(Destinations::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}
