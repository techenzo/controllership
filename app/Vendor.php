<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    ///Table Name

    protected $table = 'tbl_vendors_info';

    //Primary Key
    public $primaryKey = 'id';


    //Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function scopeSearch($query, $s){
        return $query->Where ('firstname', 'like', '%' .$s. '%')
            ->orWhere('vendor', 'like', '%' .$s. '%');
    }

    //for export files
    public $fillable = ['vendor','firstname'];
}


