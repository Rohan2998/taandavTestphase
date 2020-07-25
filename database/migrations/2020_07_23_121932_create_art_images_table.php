<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('art_images', function (Blueprint $table) {
            $table->id();
            $table->boolean('uploaded_by_admin')->default(true);
            $table->integer('uploaded_by');
            $table->string('title');
            $table->string('description')->nullable();
            //this is for images and gif 
            $table->string('art_img_path')->default('art_img');
            $table->string('art_img_name')->nullable();
            //this is for link
            $table->string('link')->nullable();
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
        Schema::dropIfExists('art_images');
    }
}
