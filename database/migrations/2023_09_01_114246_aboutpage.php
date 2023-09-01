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
      Schema::create('aboutpage', function(Blueprint  $table){
        $table->id();
        $table->string('title')->nullable();
        $table->string('Short_title')->nullable();
        $table->text('description')->nullable();       
        $table->text('resume_link')->nullable();
        $table->string('about_image')->nullable();
        $table->timestamps();

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aboutpage');
    }
};
