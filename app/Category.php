<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Esto crea la relación uno a muchos
class Category extends Model
{
    protected $table = 'categories';

    public function articles(){
        return $this->hasMany('App\Article');
    }


}
