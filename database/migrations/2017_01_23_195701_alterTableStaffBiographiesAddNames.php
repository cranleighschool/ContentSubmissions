<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableStaffBiographiesAddNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		DB::statement('ALTER TABLE staff_biographies ADD forename varchar(50) AFTER username');
		DB::statement('ALTER TABLE staff_biographies ADD surname varchar(50) AFTER forename');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Don't need to do anything here, as the migration file that creates the table will drop it anyway!
    }
}
