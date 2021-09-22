<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilitys extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function travel()
    {
        return $this->belongsToMany(Travel::class);
    }

    public function armada()
    {
        return $this->belongsToMany(Armada::class);
    }
}
