<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable()->default('Dev.Io');
            $table->string("facebook")->nullable()->default('https://www.facebook.com/share/1ABwCZCS1c/');
            $table->string("linkedin")->nullable()->default('https://www.linkedin.com/in/muhammad-radwan-782712344?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app');
            $table->string("Github")->nullable()->default('https://github.com/DevRADWAN20');
            $table->string("instagram")->nullable()->default('https://www.instagram.com/mohamed.radwan.72?igsh=MWNtZzBtdDN1OTdmaQ==');
            $table->text("about_us_content")->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
