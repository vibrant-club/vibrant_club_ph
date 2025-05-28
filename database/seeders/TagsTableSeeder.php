<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Beauty',
            'Fashion',
            'Lifestyle',
            'Fitness',
            'Health & Wellness',
            'Travel',
            'Food & Drink',
            'Parenting',
            'Tech',
            'Gaming',
            'Education',
            'Business',
            'Finance',
            'Home & DIY',
            'Photography',
            'Art & Design',
            'Entertainment',
            'Music',
            'Motivation',
            'Books',
            'Spirituality',
            'Sustainability',
            'Animals & Pets',
            'Comedy',
            'Teens',
            'Moms',
        ];

        foreach ($tags as $tag) {
            DB::table('tags_tbl')->insert([
                'name' => $tag,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
