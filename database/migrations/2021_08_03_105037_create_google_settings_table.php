<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('google_settings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('analytics_id')->nullable();
            $table->string('ads_id', 260)->nullable();
            $table->string('maps_key', 260)->nullable();
            $table->string('maps_url')->nullable();
            $table->string('recaptcha_key', 260)->nullable();
            $table->string('recaptcha_secret', 260)->nullable();
            $table->string('tag_manager_id')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('google_settings');
    }
};
