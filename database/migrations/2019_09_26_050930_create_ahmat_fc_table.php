<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAhmatFcTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ahmat_fc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->integer('Age');
            $table->string('Work_Foot');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ahmat_fc');
    }
}
