<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tag;
use App\Models\Listing;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $tags = Tag::factory(10)->create();

        User::factory(10)->create()->each(function($user) use ($tags) {
            Listing::factory(rand(1, 4))->create([
                'user_id' => $user->id,
            ])->each(function($listing) use ($tags) {
                $listing->tags()->attach($tags->random(2)->pluck('id'));
            });
        });
    }
}

