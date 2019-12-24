<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('writer_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('publisher_id')->nullable();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->decimal('price',12,2)->comment('Unite Price')->nullable();
            $table->longText('summary')->nullable();
            $table->string('photo')->nullable();
            $table->integer('stock_quantity')->default(0);
            $table->integer('status')->default(1);
            $table->integer('created_by');
            $table->integer('updated_by');
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
