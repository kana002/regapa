<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_organisations', function (Blueprint $table) {
            $table->id();
            $table->string('bin', 12);
            $table->string('reg_id', 2);
            $table->text('org_name');
            $table->timestamp('date')->useCurrent();
            $table->tinyInteger('edit')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_organisations');
    }
}
