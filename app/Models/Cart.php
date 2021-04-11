<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
        //Table Name
   protected  $table='carts'; 
   //Primary Key
   public $primaryKey='id'; 
   
   //Timestamps
   public $timestamps=true; 
   
   public function user(){
       return $this->belongsTo('App\Models\User'); 
   }

   public function post()
   {
    return $this->belongsTo('App\Models\Post'); 
    }

}
