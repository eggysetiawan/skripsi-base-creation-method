<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsApprovedToSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->tinyInteger('is_confirmed')->after('is_maut')->default(0);
            $table->tinyInteger('is_approved')->after('is_confirmed')->default(0);
            $table->tinyInteger('already_done')->after('is_approved')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn('is_approved');
            $table->dropColumn('already_done');
        });
    }
}
