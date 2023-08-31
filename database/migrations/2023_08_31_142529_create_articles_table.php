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
        Schema::create('articles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->foreign('id')->on('users')->onDelete('cascade');
            $table->uuid('document_id')->foreign('id')->on('documents')->onDelete('cascade');
            $table->uuid('topical_map_id')->foreign('id')->on('files')->onDelete('cascade');
            $table->text('article')->nullable();
            $table->text('web_url')->nullable();
            $table->text('token')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
