<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchieveMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archive_members', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->integer('batch_id')->nullable();
            $table->string('session')->nullable();
            $table->string('elected_years')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('archive_members');
    }
}
