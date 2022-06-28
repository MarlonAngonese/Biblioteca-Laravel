<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('illustrator_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('illustrator_id');
            $table->unsignedBigInteger('book_id');
            $table->foreign('illustrator_id')->references('id')->on('illustrators')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
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
        Schema::dropIfExists('illustrator_books');
    }
};