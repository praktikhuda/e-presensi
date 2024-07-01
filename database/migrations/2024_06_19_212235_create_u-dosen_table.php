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
        Schema::create('u-dosen', function (Blueprint $table)
        {
            $table->id();
            $table->string('username', 255);
            $table->string('email', 255);
            $table->string('email_verified_at', 255);
            $table->string('password', 255);
            $table->string('remember_token', 100);
            $table->string('nama', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('u-dosen');
    }
};
