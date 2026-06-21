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
        // Service::truncate();

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

        // Seeding Technologies
        // \App\Models\Technology::truncate();

        $technologiesDirectory = storage_path('app/public/technologies');
        if (!file_exists($technologiesDirectory)) {
            mkdir($technologiesDirectory, 0755, true);
        }

        $techItems = [
            // Frontend
            [
                'name' => 'HTML5',
                'category' => 'frontend',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg',
                'brief' => 'The standard markup language for creating web pages.'
            ],
            [
                'name' => 'CSS3',
                'category' => 'frontend',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg',
                'brief' => 'Style sheet language used for describing the presentation of a document.'
            ],
            [
                'name' => 'JavaScript',
                'category' => 'frontend',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg',
                'brief' => 'High-level, dynamic, and interpreted programming language for client-side interactivity.'
            ],
            [
                'name' => 'React',
                'category' => 'frontend',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg',
                'brief' => 'A popular JavaScript library for building interactive user interfaces.'
            ],
            [
                'name' => 'Vue.js',
                'category' => 'frontend',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original.svg',
                'brief' => 'Progressive JavaScript framework for building modern single-page applications.'
            ],
            [
                'name' => 'Next',
                'category' => 'frontend',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nextjs/nextjs-original.svg',
                'brief' => 'A React framework for production-grade server-side rendering and static generation.'
            ],
            [
                'name' => 'Bootstrap',
                'category' => 'frontend',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg',
                'brief' => 'The most popular HTML, CSS, and JS library for responsive mobile-first frontend development.'
            ],

            // Backend
            [
                'name' => 'PHP',
                'category' => 'backend',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg',
                'brief' => 'A widely-used open source general-purpose scripting language suited for web development.'
            ],
            [
                'name' => 'Laravel',
                'category' => 'backend',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg',
                'brief' => 'A progressive PHP framework for web artisans, providing clean and elegant syntax.'
            ],
            [
                'name' => 'Node.js',
                'category' => 'backend',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg',
                'brief' => 'An open-source, cross-platform JavaScript runtime environment for server-side execution.'
            ],
            [
                'name' => 'Python',
                'category' => 'backend',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg',
                'brief' => 'Versatile, high-level programming language known for readability and clean syntax.'
            ],
            [
                'name' => 'Java',
                'category' => 'backend',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg',
                'brief' => 'Robust, object-oriented programming language designed for enterprise applications.'
            ],

            // Database
            [
                'name' => 'MySQL',
                'category' => 'database',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg',
                'brief' => 'Reliable and high-performance relational database management system.'
            ],
            [
                'name' => 'PostgreSQL',
                'category' => 'database',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original.svg',
                'brief' => 'Powerful, open-source object-relational database system with advanced features.'
            ],
            [
                'name' => 'MongoDB',
                'category' => 'database',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mongodb/mongodb-original.svg',
                'brief' => 'Flexible, document-oriented NoSQL database designed for scalability.'
            ],
            [
                'name' => 'Oracle',
                'category' => 'database',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/oracle/oracle-original.svg',
                'brief' => 'Enterprise-grade multi-model database management system optimized for cloud.'
            ],
            [
                'name' => 'SQL Server',
                'category' => 'database',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/microsoftsqlserver/microsoftsqlserver-original.svg',
                'brief' => 'Microsoft enterprise relational database management system for database transactions.'
            ],

            // Cloud & DevOps
            [
                'name' => 'AWS',
                'category' => 'devops',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/amazonwebservices/amazonwebservices-plain-wordmark.svg',
                'brief' => 'Amazon Web Services, a comprehensive and secure cloud computing platform.'
            ],
            [
                'name' => 'Microsoft Azure',
                'category' => 'devops',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/azure/azure-original.svg',
                'brief' => 'Cloud computing service created by Microsoft for building and managing applications.'
            ],
            [
                'name' => 'Google Cloud Platform',
                'category' => 'devops',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/googlecloud/googlecloud-original.svg',
                'brief' => 'Google suite of cloud computing services running on the same infrastructure.'
            ],
            [
                'name' => 'Docker',
                'category' => 'devops',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg',
                'brief' => 'Platform for containerization to build, ship, and run applications in any environment.'
            ],
            [
                'name' => 'Kubernetes',
                'category' => 'devops',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/kubernetes/kubernetes-original.svg',
                'brief' => 'Open-source container orchestration engine for automating deployment and scaling.'
            ],
            [
                'name' => 'CI/CD Pipelines',
                'category' => 'devops',
                'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/githubactions/githubactions-original.svg',
                'brief' => 'Continuous Integration and Continuous Deployment pipelines for automated delivery.'
            ]
        ];

        foreach ($techItems as $item) {
            $filename = strtolower(str_replace([' ', '.', '/'], '', $item['name'])) . '.svg';
            $localPath = 'technologies/' . $filename;
            $fullLocalPath = storage_path('app/public/' . $localPath);

            // Fetch and save logo
            try {
                $content = @file_get_contents($item['logo_url']);
                if ($content !== false) {
                    file_put_contents($fullLocalPath, $content);
                } else {
                    file_put_contents($fullLocalPath, '');
                }
            } catch (\Exception $e) {
                file_put_contents($fullLocalPath, '');
            }

            \App\Models\Technology::create([
                'name' => $item['name'],
                'category' => $item['category'],
                'logo' => $localPath,
                'brief' => $item['brief'],
                'status' => true,
            ]);
        }
    }
}
