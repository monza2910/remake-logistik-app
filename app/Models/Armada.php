<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Armada extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name','variant','origin_id','destination_id','price','thumbnail','content','slug'];

    public function origin()
    {
    	return $this->belongsTo(Origins::class);
    }

    public function destination()
    {
    	return $this->belongsTo(Destinations::class);
    }

    public function armadatransaction()
    {
    	return $this->hasMany(ArmadaTransactions::class);
    }

    public function facilitys()
    {
        return $this->belongsToMany(Facilitys::class);
    }
}
