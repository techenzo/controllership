<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    ////Table Name

    protected $table = 'terms';

    //Primary Key
    public $primaryKey = 'id';


    //Timestamps
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
