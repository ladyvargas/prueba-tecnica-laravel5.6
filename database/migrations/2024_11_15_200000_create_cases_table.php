<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('cases', function (Blueprint $table) {
        $table->increments('id');
        $table->string('title');
        $table->text('description');
        $table->enum('status', ['abierto', 'en proceso', 'cerrado']);
        $table->unsignedInteger('user_id'); // Foreign key referencing users
        $table->timestamps();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cases');
    }
}
