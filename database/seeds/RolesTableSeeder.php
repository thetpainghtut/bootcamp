<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		//
		Role::create(['name' => "admin"]);
		Role::create(['name' => "teacher"]);
		// Role::create(['guard_name' => 'mentor','name' => "mentor"]);
		// Role::create(['name' => "student"]);
	}
}
