<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $guarded = [];

    ///Table Name

    public $table = 'vendors';
    //Primary Key
    public $primaryKey = 'id';

    //Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function item(){
        return $this->belongsTo('App\Item');
    }

    public function scopeSearch($query, $s){
        return $query->Where ('firstname', 'like', '%' .$s. '%')
            ->orWhere('vendor', 'like', '%' .$s. '%');
    }

    //for export files only two data
    // public $fillable = ['vendor','firstname'];
}
