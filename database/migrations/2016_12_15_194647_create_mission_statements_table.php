<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_statements', function (Blueprint $table) {
            $table->increments('id');
            $table->text('statement');
            $table->string('code');
            $table->integer('org_request')->unsigned();
            $table->foreign('org_request')->references('id')->on('org_requests');
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
        Schema::dropIfExists('mission_statements');
    }
}
