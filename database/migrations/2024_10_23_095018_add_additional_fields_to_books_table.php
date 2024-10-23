<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('isbn')->nullable();
            $table->date('publication_date')->nullable();
            $table->string('category')->nullable();
            $table->integer('pages')->nullable();
            $table->string('cover_image')->nullable();
            // If description doesn't exist
            if (!Schema::hasColumn('books', 'description')) {
                $table->text('description')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn([
                'isbn',
                'publication_date',
                'category',
                'pages',
                'cover_image',
                'description'
            ]);
        });
    }
};
