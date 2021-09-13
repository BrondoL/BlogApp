<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();

        User::create([
            'name' => 'Aulia Ahmad Nabil',
            'username' => "admin",
            'email' => 'admin@prj.com',
            'password' => bcrypt('admin')
        ]);

        Category::create([
            'name' => "Programming",
            'slug' => "programming",
        ]);
        Category::create([
            'name' => "Web Design",
            'slug' => "web-design",
        ]);
        Category::create([
            'name' => "Personal",
            'slug' => "personal",
        ]);

        Post::factory(15)->create();
    }
}
