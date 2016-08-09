<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('permissions', function (Blueprint $table) {
	        $table->increments('id');
	        $table->string('permission_slug')->unique();
	        $table->string('name');
	        $table->timestamps();
        });
        
        Schema::create('user_permisions_map', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('permission_slug');
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
		Schema::drop('user_permisions_map');
		Schema::drop('permissions');
    }
}
