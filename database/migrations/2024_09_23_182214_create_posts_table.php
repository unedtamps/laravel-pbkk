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
        Schema::create(
            'posts', function (Blueprint $table) {
                $table->id();
                $table->string("name");
                $table->foreignId('author_id')->constrained(
                    table: 'users',
                    indexName: 'post_user_id',
                );
                $table->string("publisher");
                $table->string("city");
                $table->text("body");
                $table->string("slug");
                $table->foreignId('category_id')->constrained(
                    table: 'categories',
                    indexName: 'post_category_id',
                );

                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
