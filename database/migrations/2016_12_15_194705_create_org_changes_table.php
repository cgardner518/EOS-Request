<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrgChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org_changes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type');
            $table->string('from');
            $table->string('to');
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
        Schema::dropIfExists('org_changes');
    }
}
