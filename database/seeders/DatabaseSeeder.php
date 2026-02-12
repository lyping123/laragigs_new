<?php

namespace Database\Seeders;

use App\Models\listings;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        listings::create([
            'title'=>'laravel Senior Development',
            'tag'=>'laravel, javascript',
            'company'=>'Acme Corp',
            'location'=>'Malaysia',
            'email'=>'email@email.com',
            'website'=>'https://www.acme.com',
            'description'=>'hat first winter, it rains and rains as if we have moved to some foreign place, away from the desert; it rains and it rains, and the water comes up to the back step and I think it will enter the house'
        ]);

        listings::create([
            'title'=>'laravel Junior Development',
            'tag'=>'laravel, html',
            'company'=>'Acme Corp',
            'location'=>'England',
            'email'=>'email@email.com',
            'website'=>'https://www.acme.com',
            'description'=>'hat first winter, it rains and rains as if we have moved to some foreign place, away from the desert; it rains and it rains, and the water comes up to the back step and I think it will enter the house'
        ]);

    }
}
