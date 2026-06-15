<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Service::create([
            'title'=>'Web Development',
            'description'=>'Custom Web Applications'
            ]);

            Service::create([
            'title'=>'Mobile App Development',
            'description'=>'Android & iOS Apps'
            ]);

            Service::create([
            'title'=>'Cloud Solutions',
            'description'=>'AWS & Azure'
            ]);

            Service::create([
            'title'=>'Software Solutions',
            'description'=>'Enterprise Software'
            ]);
    }
}
