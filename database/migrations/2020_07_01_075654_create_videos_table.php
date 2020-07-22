<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uploaded_by');
            //this is for videos
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('path');
            $table->string('Stream_disk')->default('streaming_path');
            $table->string('stream_path')->nullable();
            $table->boolean('processed')->default(false);
            $table->datetime('converted_for_streaming_at')->nullable();
            $table->string('thumb_disk')->default('thumb_path');
            $table->string('thumbnails')->nullable();
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
        Schema::dropIfExists('videos');
    }
}
