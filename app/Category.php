<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Esto crea la relación uno a muchos
class Category extends Model
{
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'category_id', 'main', 'parent'
    ];

    public function articles(){
        return $this->hasMany('App\Article');
    }


}
