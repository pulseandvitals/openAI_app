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
        Schema::create('files', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->foreign('id')->on('users')->onDelete('cascade');
            $table->uuid('document_id')->foreign('id')->on('documents')->onDelete('cascade');
            $table->boolean('is_article_completed')->default(0);
            $table->string('website_url')->nullable();
            $table->string('url')->nullable();
            $table->bigInteger('position')->nullable();
            $table->string('status')->nullable();
            $table->text('main_topic_1')->nullable();
            $table->text('sub_topic_2')->nullable();
            $table->text('sub_topic_3')->nullable();
            $table->text('sub_topic_4')->nullable();
            $table->text('keyword')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('serp_analysis')->nullable();
            $table->text('search_content')->nullable();
            $table->text('content_type')->nullable();
            $table->bigInteger('search_volume')->nullable();
            $table->float('cpc', 8,2)->nullable();
            $table->boolean('str4_kw', 8,2)->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('import_data');
    }
};
