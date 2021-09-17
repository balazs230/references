<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->char('title', 200);
            $table->char('author', 150);
            $table->integer('category_id');
            $table->char('language', 50);
            $table->char('size', 50);
            $table->float('price')->default(0);
            $table->float('discount')->default(0);
            $table->integer('stock')->default(0);
            $table->integer('pages');
            $table->date('publication');
            $table->char('image', 200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
