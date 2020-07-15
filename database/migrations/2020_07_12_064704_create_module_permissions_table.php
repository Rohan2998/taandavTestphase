<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_permissions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->boolean('upload_feed')->default(false);
            $table->boolean('upload_art')->default(false);
            $table->boolean('approve_ads')->default(false);
            $table->boolean('toggle_user_info')->default(false);
            $table->boolean('add_admin')->default(false);
            $table->boolean('remove_admin')->default(false);
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
        Schema::dropIfExists('module_permissions');
    }
}
