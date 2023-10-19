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
        Schema::create('headings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->foreign('id')->on('users')->onDelete('cascade');
            $table->string('heading_id')->foreign('id')->on('files')->onDelete('cascade');
            $table->integer('position_order');
            $table->text('heading_title');
            $table->text('html_format');
            $table->text('heading_type');
            $table->boolean('is_completed')->default(false);
            $table->boolean('is_started')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('headings');
    }
};
