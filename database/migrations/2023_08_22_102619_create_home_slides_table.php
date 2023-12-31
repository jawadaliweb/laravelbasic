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
Schema::create('home_slides', function (Blueprint $table) {
    $table->id()->nullable();
    $table->string('title')->nullable();
    $table->string('description')->nullable();
    $table->string('home_image')->nullable();
    $table->string('video_url')->nullable();
    $table->string('back_color')->nullable();
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
        Schema::dropIfExists('home_slides');
    }
};
