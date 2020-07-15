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
            $table->string('img_path')->default('Custom_ads');
            $table->string('img_name')->nullable();
            $table->string('link')->nullable();
            $table->boolean('expired')->default(false);
            $table->boolean('approved')->default(false);
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
