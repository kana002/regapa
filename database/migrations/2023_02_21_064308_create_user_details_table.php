<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->text('avatar')->nullable();
            $table->date('birthday');
            $table->boolean('gender')->nullable();
            $table->string('iin', 12)->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('living_address')->nullable();
            $table->string('job_org')->nullable();
            $table->string('job_position')->nullable();
            $table->string('stazh_gos')->nullable();
            $table->string('stazh_project_man')->nullable();
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
        Schema::dropIfExists('user_details');
    }
}
