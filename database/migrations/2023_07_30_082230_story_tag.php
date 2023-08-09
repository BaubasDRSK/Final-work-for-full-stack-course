<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('story_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('story_id');
            $table->unsignedBigInteger('tag_id');

            $table->foreign('story_id')->references('id')->on('stories')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            // Make the combination of user_id and role_id unique to prevent duplicates
            $table->unique(['story_id', 'tag_id']);
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('story_tag');
    }
};