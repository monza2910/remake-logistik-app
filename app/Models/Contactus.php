<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    use HasFactory;

    protected $table = 'contactuses';
    protected $fillable = ['nama','phone','email','message','created_at','updated_at'];
    
}
