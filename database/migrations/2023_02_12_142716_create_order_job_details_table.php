<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderJobDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_job_details', function (Blueprint $table) {
            $table->bigInteger('order_id');
            //$table->foreign('order_id')->references('id')->on('orders');
            $table->bigInteger('org_id');
            $table->string('bin', 50);
            $table->string('job_role', 255);
            $table->integer('job_category_id');
            $table->string('public_service_experience', 10);
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
        Schema::dropIfExists('order_job_details');
    }
}
