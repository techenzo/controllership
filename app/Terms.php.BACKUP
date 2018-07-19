<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    ////Table Name

    protected $table = 'tbl_terms';

    //Primary Key
    public $primaryKey = 'terms_id';


    //Timestamps
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
