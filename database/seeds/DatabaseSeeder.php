<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        if (App::environment() === 'production') {
            $this->call(UserTableSeeder::class);
            $this->call(UserProfileTableSeeder::class);
        } else {
            $this->call(UserTableSeeder::class);
            $this->call(UserProfileTableSeeder::class);
            $this->call(OrganizationTableSeeder::class);
        }

        Model::reguard();
    }
}
