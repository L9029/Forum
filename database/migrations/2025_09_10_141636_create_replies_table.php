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
        Schema::create('replies', function (Blueprint $table) {
            $table->id();
            // Relacion a si mismo (replies)
            $table->unsignedBigInteger("reply_id")->nullable();
            $table->foreign("reply_id")->references("id")->on("replies")->onDelete("set null");

            // Relacion a threads
            $table->unsignedBigInteger("thread_id");
            $table->foreign("thread_id")->references("id")->on("threads")->onDelete("cascade");

            // Relacion a usuarios
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            
            $table->text("body");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replies');
    }
};
