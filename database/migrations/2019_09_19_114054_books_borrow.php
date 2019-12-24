<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BooksBorrow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_borrow', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('member_id')->nullable();
            $table->string('issue_date')->nullable();
            $table->string('date_for_return')->nullable();
            $table->string('returned_date')->nullable();
            $table->integer('is_returned')->default(0);
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
        Schema::dropIfExists('books_borrow');
    }
}
