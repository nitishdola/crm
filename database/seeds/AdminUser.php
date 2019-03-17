<?php

use Illuminate\Database\Seeder;

class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(['name' => 'Administrator', 'email' => 'nitish.dola@gmail.com', 'password' => bcrypt('password#')]);
    }
}
