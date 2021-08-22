<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    use HasFactory;
    protected $table = 'sliders';
    protected $fillable = ['title_one','title_two','description','image','button_id','status','created_at','updated_at'];

    public function button()
    {
    	return $this->belongsTo(Buttons::class);
    }
}
