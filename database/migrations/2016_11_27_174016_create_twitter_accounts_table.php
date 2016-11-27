<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwitterAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('twitter_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('screen_name');
            $table->string('owner');
            $table->text('mission');
            $table->text('branding_notes');
            $table->boolean('password_centralised');
            $table->text('general_notes');
            $table->bigInteger('followers');
            $table->text('last_active');
            $table->text('tags');
            $table->string('owner_email');
            $table->string('id_str');
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
        Schema::dropIfExists('twitter_accounts');
    }
}
