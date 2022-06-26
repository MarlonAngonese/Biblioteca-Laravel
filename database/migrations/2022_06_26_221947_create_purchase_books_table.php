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
        Schema::create('purchase_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id')->nullable(true);
            $table->unsignedBigInteger('purchase_id')->nullable(true);
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade');
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
        Schema::dropIfExists('purchase_books');
    }
};
