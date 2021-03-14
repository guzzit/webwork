<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersSignupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_signup', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('surname');
            $table->date('DOB');
            $table->string('gender');
            $table->integer('mobile_number');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('type');
            $table->string('job_sector');
            $table->string('highest_qualification');
            $table->integer('experience');
            $table->string('short_description');
            $table->string('relocation_willingness');
            $table->string('salary_range');
            $table->string('city');
            $table->string('cv');
            $table->string('five_tag_summation');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users_signup');
    }
}
