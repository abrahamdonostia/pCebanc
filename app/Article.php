<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    //relación de muchos a uno
    public function user(){
        return $this->belongsTo('App\User', 'user_id');//modelo tabla con la que tiene relacion, propiedad del modelo article con la que se relaciona
    }

    public function category(){
        return $this->belongsTo('App\Category', 'category_id' );
    }
}
