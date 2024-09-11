<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Sites table
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('domain')->unique(); // Domain of the site
            $table->boolean('active')->default(1); // Is the site active?
            $table->timestamps();
        });

        // Posts table
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->constrained()->onDelete('cascade'); // Site association
            $table->string('title');
            $table->text('content'); // HTML content
            $table->string('meta_title')->nullable(); // Meta title for SEO
            $table->string('meta_description')->nullable(); // Meta description for SEO

            // Author fields directly in the posts table
            $table->string('Author_name')->nullable();
            $table->string('Author_email')->nullable();
            $table->string('Author_image')->nullable();

            // Category field directly in the posts table
            $table->string('category_name')->nullable();

            $table->timestamps();
        });

        // Pages table with hierarchical structure
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->constrained()->onDelete('cascade'); // Site association
            $table->string('title');
            $table->text('content'); // HTML content
            $table->string('meta_title')->nullable(); // Meta title for SEO
            $table->string('meta_description')->nullable(); // Meta description for SEO
            $table->string('slug'); // Page slug for hierarchical URLs

            // Self-referencing foreign key for parent-child page relationships
            $table->foreignId('parent_id')->nullable()->constrained('pages')->onDelete('cascade');

            // Author fields directly in the pages table
            $table->string('Author_name')->nullable();
            $table->string('Author_email')->nullable();
            $table->string('Author_image')->nullable();

            // Category field directly in the pages table
            $table->string('category_name')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('pages');
        Schema::dropIfExists('sites');
    }
};
