<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArmadaDetail extends Model
{
    use HasFactory;

    protected $fillable  = [
        'armada_transaction_id',
        'armada_id',
        'qty',
        'harga',
        'keterangan'
    ];

    public function armada(){
        return $this->belongsTo(Armada::class);
    }

    public function armadatransaction(){
        return $this->belongsTo(ArmadaTransaction::class);
    }


}
