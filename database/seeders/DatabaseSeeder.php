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
        $user=User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => '123456',
        ]);

        listings::factory(6)->create([
            "user_id"=>$user->id
        ]);


        
    }
}
