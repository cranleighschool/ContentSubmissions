<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
			'permission_slug' => 'staff',
			'name' => 'Staff',
		]);
		DB::table('permissions')->insert([
			'permission_slug' => 'superadmin',
			'name' => 'Super Admin'
		]);
		DB::table('permissions')->insert([
			'permission_slug' => 'admin',
			'name' => 'Admin'
		]);
    }
}
