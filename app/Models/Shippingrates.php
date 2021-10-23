<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shippingrates extends Model
{
    use HasFactory;
    protected $fillable = ['origin_id','destination_id','under_terms','above_terms','est_arrived','variantservice_id','created_at','updated_at','one_ton','five_ton','ten_ton'];

    public function origin()
    {
    	return $this->belongsTo(Origins::class);
    }
    public function destination()
    {
    	return $this->belongsTo(Destinations::class);
    }
    public function variantservice()
    {
    	return $this->belongsTo(Variantservices::class);
    }
}
