<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        //Demo Password Generator
        User::factory()->create(['email' => "sameera@test.com", "password" => bcrypt('19901126')]);

    }
}
