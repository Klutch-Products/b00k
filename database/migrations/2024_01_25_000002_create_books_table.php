<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('author_id')->constrained()->onDelete('cascade');
            $table->text('description')->nullable();
            $table->string('isbn', 13)->nullable();
            $table->date('publication_date')->nullable();
            $table->string('category')->nullable();
            $table->integer('pages')->nullable();
            $table->string('cover_image')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};