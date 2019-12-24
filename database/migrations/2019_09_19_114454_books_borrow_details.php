<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BooksBorrowDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_borrow_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('borrow_id')->nullable();
            $table->string('book_id')->nullable();
            $table->string('book_quantity')->nullable();
            $table->integer('return_status')->default(0);
            $table->string('remarks')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
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
        Schema::dropIfExists('books_borrow_details');
    }
}
