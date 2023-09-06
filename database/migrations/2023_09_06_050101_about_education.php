<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

   
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AboutEducation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->date('from_date');
            $table->date('to_date');
            $table->text('description');
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('AboutEducation');
    }
};
