<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewForeignKeysInTestingOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testing_orders', function (Blueprint $table) {
            $table->integer('status_id')->unsigned()->index()->change();
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->bigInteger('category_id')->unsigned()->index()->change();
            $table->foreign('category_id')->references('id')->on('test_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testing_orders', function (Blueprint $table) {
            //
        });
    }
}
