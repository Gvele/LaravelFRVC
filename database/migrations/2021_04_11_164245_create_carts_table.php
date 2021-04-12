<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::dropIfExists('carts');
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id'); 
            $table->bigInteger('post_id')->unsigned();
            $table->timestamps();
          //  $table->index('post_id');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
         


        });
    }  

        

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
       
          
    }
}
