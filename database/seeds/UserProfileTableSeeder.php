<?php

use App\UserProfile;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserProfileTableSeeder extends Seeder
{

    /**
     * Run the users seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_profiles')->delete();
        $statement = "ALTER TABLE users_profiles AUTO_INCREMENT = 1;";
        DB::unprepared($statement);

        UserProfile::create([
            'firstname' => 'Alexandre',
            'lastname' => 'Mangin',
            'phone' => '0616391876',
            'user_id' => 1,
        ]);

        UserProfile::create([
            'firstname' => 'Alan',
            'lastname' => 'Corbel',
            'phone' => '0626381876',
            'user_id' => 2,
        ]);

        UserProfile::create([
            'firstname' => 'Christophe',
            'lastname' => 'Larquey',
            'phone' => '0605040302',
            'user_id' => 3,
        ]);

    }

}
