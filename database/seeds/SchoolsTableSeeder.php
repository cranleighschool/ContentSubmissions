<?php

use Illuminate\Database\Seeder;
use Illumniate\Database\Eloquent\Model;
class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	DB::table('schools')->insert([
		'slug' => 'cranleigh',
		'title' => 'Cranleigh School'
	]);
	DB::table('schools')->insert([
		'slug' => 'cranprep',
		'title' => 'Cranleigh Prep School'
	]);
    }
}
