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
        Schema::table('books', function (Blueprint $table) {
            $table->string('isbn', 13)->nullable()->after('description');
            $table->date('publication_date')->nullable()->after('isbn');
            $table->string('category')->nullable()->after('publication_date');
            $table->integer('pages')->nullable()->after('category');
            $table->string('cover_image')->nullable()->after('pages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn(['isbn', 'publication_date', 'category', 'pages', 'cover_image']);
        });
    }
};
