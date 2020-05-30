<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'description', 'email', 'password', 'role', 'image', 'created_at', 'updated_at', 'activated'
    ];
    //public $incrementeing=false;
    protected $primaryKey = 'user_id';//Si por defecto el nombre del campo Id de la tabla no se llama id, hay que indicarle cual es 

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //Esto crea la relación uno a muchos
    public function articles(){
        return $this->hasMany('App\Article');
    }
}
