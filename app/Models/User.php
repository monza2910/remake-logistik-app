<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'outlet_id',
        'image',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
    	return $this->belongsTo(Roles::class);
    }
    public function outlet()
    {
    	return $this->belongsTo(Outlets::class);
    }
    public function article()
    {
    	return $this->hasMany(Articles::class);
    }
    public function transaction()
    {
    	return $this->hasMany(Transaction::class);
    }
    public function transactiontravel()
    {
    	return $this->hasMany(TravelTransaction::class);
    }
    public function transactionarmada()
    {
    	return $this->hasMany(ArmadaTransaction::class);
    }
}
