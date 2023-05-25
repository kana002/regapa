<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestingOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testing_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('test_gen');
            $table->integer('reg_id');
            $table->string('iin', 12);
            $table->integer('category_id');
            $table->string('lang_id', 2);
            $table->date('desired_test_date');
            $table->bigInteger('user_id');
            $table->longText('reason');
            $table->integer('status_id');
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
        Schema::dropIfExists('testing_orders');
    }
}
