<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $fillable = ['name'];

    // source code upload multiple files
    // https://www.cloudways.com/blog/laravel-multiple-files-images-upload/

    public function vendor(){
        return $this->hasMany('App\Vendor');
    }




}
