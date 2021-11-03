<?php

namespace Database\Seeders;

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
        //$this->call(RoleSeeder::class);
        \App\Models\User::factory(20)->create();
        //$this->call(FollowerSeeder::class);
       $this->call(PostSeeder::class);
        // $this->call(CommentSeeder::class);
        // $this->call(ReactionSeeder::class);



    }
}
