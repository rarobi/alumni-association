<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('user_id');
            $table->integer('batch_id');
            $table->string('nid');
            $table->string('image');
            $table->string('education_qualification');
            $table->integer('marital_status');
            $table->string('marital_status');
            $table->string('occupation');
            $table->string('job_position');
            $table->string('emergency_contact');
            $table->string('present_address');
            $table->string('parmanent_address');
            $table->string('facebook_link');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profile');
    }
}
