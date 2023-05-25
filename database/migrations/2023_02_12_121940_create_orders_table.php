<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('gen');
            $table->integer('reg_id');
            $table->string('surname', 50);
            $table->string('name', 50);
            $table->string('middlename', 50);
            $table->string('gender', 30);
            $table->string('iin', 12);
            $table->string('vaccine', 50);
            $table->date('birth_date');
            $table->integer('course_type_id');
            $table->integer('course_id');
            $table->string('lang_id', 2);
            $table->date('study_start_date');
            $table->date('study_end_date');
            $table->string('student_tel_self', 15);
            $table->string('student_tel_job', 15);
            $table->string('student_email');
            $table->string('student_boss_tel_self', 15);
            $table->string('student_boss_tel_job', 15);
            $table->string('student_boss_email');
            $table->string('student_boss_full_name', 100);
            $table->string('kadr_tel', 15);
            $table->string('kard_email');
            $table->string('kard_full_name', 100);
            $table->string('org_who_sent', 50);
            $table->unsignedBigInteger('user_id');
            $table->longText('reason');
            $table->integer('status_id');
            $table->integer('active_year_id');
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
        Schema::dropIfExists('orders');
    }
}
