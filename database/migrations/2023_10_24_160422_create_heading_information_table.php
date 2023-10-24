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
        Schema::create('heading_information', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->foreign('id')->on('users')->onDelete('cascade');
            $table->uuid('heading_id')->foreign('id')->on('headings')->onDelete('cascade');
            $table->text('additional_information');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heading_information');
    }
};
