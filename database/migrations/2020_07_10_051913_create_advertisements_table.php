<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('title');
            $table->string('description')->nullable();
            //this is for video uploading
            $table->string('original_name')->nullable();
            $table->string('disk')->default('original_path');
            $table->string('path');
            $table->string('Stream_disk')->default('streaming_path');
            $table->string('stream_path')->nullable();
            $table->boolean('processed')->default(false);
            $table->datetime('converted_for_streaming_at')->nullable();
            $table->string('thumb_disk')->default('thumb_path');
            $table->string('thumbnails')->nullable();
            //this is for image path
            $table->string('img_path')->default('Custom_ads');
            $table->string('img_name')->nullable();
            //this is when only link is provided
            $table->string('link')->nullable();
            $table->boolean('expired')->default(false);
            $table->boolean('approved')->default(false);
            $table->boolean('disapproved')->default(false);
            $table->datetime('approved_at')->nullable();
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
        Schema::dropIfExists('advertisements');
    }
}
