<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        
    ];

    public function store() {
        return $this->hasOne(Store::class);
    }
}


//Mapear relações via Model no Eloquent

// 1:1 - Um para um (Usuario e Loja) / hasOne e belongsTo
// 1:N - Um para muitos (Loja e Produtos) / hasMany e belongsTo
// N:N - Muitos para muitos (Produtos e Categorias) / belongsToMany