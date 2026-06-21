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
        User::firstOrCreate(
            ['email' => 'admin@quin.com'],
            [
                'name' => 'Admin User',
                'password' => \Illuminate\Support\Facades\Hash::make('SecureAdmin2026!'),
                'is_admin' => true,
            ]
        );

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Truncate existing duplicate services to start fresh
        Service::truncate();

        Service::create([
            'title' => 'Web Development',
            'icon' => 'fas fa-code',
            'description' => 'Custom, responsive, and performance-optimized websites and web applications built using modern frameworks.'
        ]);

        Service::create([
            'title' => 'Mobile App Development',
            'icon' => 'fas fa-mobile-alt',
            'description' => 'Native and cross-platform mobile apps for iOS and Android, designed for seamless user experience.'
        ]);

        Service::create([
            'title' => 'Cloud Solutions',
            'icon' => 'fas fa-cloud',
            'description' => 'Secure and scalable cloud hosting, migration, and infrastructure management using AWS and Azure.'
        ]);

        Service::create([
            'title' => 'Software Solutions',
            'icon' => 'fas fa-laptop-code',
            'description' => 'Enterprise-grade software systems, API integrations, and customized automation tools for your business.'
        ]);

        Service::create([
            'title' => 'Digital Marketing',
            'icon' => 'fas fa-bullhorn',
            'description' => 'Strategic SEO, SEM, social media management, and digital advertising campaigns to boost your online presence.'
        ]);

        Service::create([
            'title' => 'IT Consulting',
            'icon' => 'fas fa-handshake',
            'description' => 'Strategic IT advisory services to align your technology investments with your business objectives.'
        ]);

        Service::create([
            'title' => 'Cybersecurity Services',
            'icon' => 'fas fa-shield-alt',
            'description' => 'Threat assessment, secure infrastructure design, data encryption, and robust protection against cyber attacks.'
        ]);

        Service::create([
            'title' => 'E-Commerce Solutions',
            'icon' => 'fas fa-shopping-cart',
            'description' => 'Custom online storefronts, shopping carts, secure payment gateways, and inventory management integration.'
        ]);

        Service::create([
            'title' => 'Support & Maintenance',
            'icon' => 'fas fa-tools',
            'description' => 'Proactive system monitoring, debugging, performance optimization, and 24/7 technical support services.'
        ]);

        Service::create([
            'title' => 'Emerging Technologies',
            'icon' => 'fas fa-robot',
            'description' => 'Cutting-edge solutions utilizing Artificial Intelligence, Machine Learning, Blockchain, and IoT integration.'
        ]);
    }
}
