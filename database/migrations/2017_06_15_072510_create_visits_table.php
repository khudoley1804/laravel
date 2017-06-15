<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         try{
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_route');
            $table->integer('count');
            $table->dateTime('dateTime');
           
        });
        } catch (Exception $e) {
            $this->down();
            throw $e;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
