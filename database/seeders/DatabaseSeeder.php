<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('posts')->insert([
            'title' => Str::random(10),
            'categories_id' => 10,
            'user_id' => 10,
            'desc' => Str::random(10).' Desc',
            'content' => Str::random(10).' Content',
            'path' => Str::random(10).' Path',
            'image_path' => Str::random(10).' image', 
        ]);
    }
}
