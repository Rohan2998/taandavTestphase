<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('contact_no');
            $table->string('password')->nullable();
            $table->boolean('show_skills')->default(false);
            $table->string('about_me')->nullable();
            $table->boolean('show_contact')->default(false);
            $table->boolean('facebook_signin')->default(false);
            $table->boolean('google_signin')->default(false);
            $table->boolean('social_signin')->default(false);
            $table->boolean('subscription_exp')->default(true);
            $table->rememberToken();
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
        Schema::dropIfExists('customers');
    }
}
