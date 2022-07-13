<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Classroom;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create(); // Sinh ra 10 bản ghi theo UserFactory
        // Classroom::factory(10)->create();
        Post::factory(10)->create();
    }
}
