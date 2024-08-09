<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
        public function run()
        {
            // Sample data for the posts table
            $posts = [
                [
                    'user_id' => 1,
                    'title' => 'First Post',
                    'excerpt' => 'This is the first post excerpt.',
                    'body' => 'This is the body of the first post.',
                    'image' => 'image1.jpg',
                ],
                [
                    'user_id' => 2,
                    'title' => 'Second Post',
                    'excerpt' => 'This is the second post excerpt.',
                    'body' => 'This is the body of the second post.',
                    'image' => 'image2.jpg',
                ],
                // Add more posts as needed
            ];
    
            // Insert sample data into the posts table
            DB::table('posts')->insert($posts);
        }
    }

