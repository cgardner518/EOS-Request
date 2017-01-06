<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeOrgChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('org_changes', function (Blueprint $table) {
            //
            $table->string('from_code');
            $table->string('to_code');
            $table->renameColumn('from', 'from_title');
            $table->renameColumn('to', 'to_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('org_changes', function (Blueprint $table) {
            //
        });
    }
}
