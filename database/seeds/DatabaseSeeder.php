<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(UsersAcessTableSeeder::class);
        factory(App\Users::class, 50)->create();
        factory(App\UsersAcess::class, 5000)->create();
    }
}
