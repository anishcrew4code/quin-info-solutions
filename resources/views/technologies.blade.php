@include('layouts.header')
@include('layouts.page-banner', ['title' => 'Technologies'])

<!-- ─── TECHNOLOGIES GRID ─── -->
<section class="inner-section">
    <div class="container">

        <div class="text-center mb-5">
            <p class="section-label">Our Tech Stack</p>
            <h2 class="section-title">Technologies We Work With</h2>
            <p class="section-sub mt-2">
                We leverage the most powerful and modern technologies to build robust,
                scalable, and future-ready solutions.
            </p>
        </div>

        @if($technologies->count())
            @php
                $grouped = $technologies->groupBy('category');
                $categories = [
                    'frontend' => 'Frontend',
                    'backend' => 'Backend',
                    'database' => 'Database',
                    'devops' => 'Cloud & DevOps'
                ];
            @endphp

            @foreach($categories as $key => $title)
                @if(isset($grouped[$key]) && $grouped[$key]->count())
                    <div class="mb-5">
                        <h4 class="tech-category-title mb-4 fw-bold text-primary">{{ $title }}</h4>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                            @foreach($grouped[$key] as $tech)
                                <div class="col">
                                    <div class="tech-card h-100 d-flex flex-column align-items-center text-center p-4">
                                        <div class="tech-logo-wrap mb-3">
                                            @if($tech->logo)
                                                <img src="{{ asset('storage/' . $tech->logo) }}" alt="{{ $tech->name }}">
                                            @else
                                                <div class="tech-placeholder-img-wrap">
                                                    <i class="fas fa-microchip tech-placeholder-icon"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <span>{{ $tech->name }}</span>
                                        @if($tech->brief)
                                            <p class="tech-brief mt-2 mb-0">{{ $tech->brief }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            {{-- Static fallback grouped by category --}}

            {{-- Frontend --}}
            <div class="mb-5">
                <h5 class="tech-category-title">Frontend</h5>
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 row-cols-lg-6 g-3">
                    @foreach([
                        ['src'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg','name'=>'HTML5'],
                        ['src'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg','name'=>'CSS3'],
                        ['src'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg','name'=>'JavaScript'],
                        ['src'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg','name'=>'React'],
                        ['src'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original.svg','name'=>'Vue.js'],
                        ['src'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg','name'=>'Bootstrap'],
                    ] as $t)
                        <div class="col">
                            <div class="tech-card">
                                <img src="{{ $t['src'] }}" alt="{{ $t['name'] }}">
                                <span>{{ $t['name'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Backend --}}
            <div class="mb-5">
                <h5 class="tech-category-title">Backend</h5>
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 row-cols-lg-6 g-3">
                    @foreach([
                        ['src'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg','name'=>'PHP'],
                        ['src'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg','name'=>'Laravel'],
                        ['src'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg','name'=>'Node.js'],
                        ['src'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg','name'=>'Python'],
                        ['src'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg','name'=>'Java'],
                    ] as $t)
                        <div class="col">
                            <div class="tech-card">
                                <img src="{{ $t['src'] }}" alt="{{ $t['name'] }}">
                                <span>{{ $t['name'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Database --}}
            <div class="mb-5">
                <h5 class="tech-category-title">Database</h5>
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 row-cols-lg-6 g-3">
                    @foreach([
                        ['src'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg','name'=>'MySQL'],
                        ['src'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original.svg','name'=>'PostgreSQL'],
                        ['src'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mongodb/mongodb-original.svg','name'=>'MongoDB'],
                        ['src'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/redis/redis-original.svg','name'=>'Redis'],
                    ] as $t)
                        <div class="col">
                            <div class="tech-card">
                                <img src="{{ $t['src'] }}" alt="{{ $t['name'] }}">
                                <span>{{ $t['name'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Cloud & DevOps --}}
            <div class="mb-2">
                <h5 class="tech-category-title">Cloud & DevOps</h5>
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 row-cols-lg-6 g-3">
                    @foreach([
                        ['src'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/amazonwebservices/amazonwebservices-plain-wordmark.svg','name'=>'AWS'],
                        ['src'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg','name'=>'Docker'],
                        ['src'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg','name'=>'Git'],
                        ['src'=>'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/linux/linux-original.svg','name'=>'Linux'],
                    ] as $t)
                        <div class="col">
                            <div class="tech-card">
                                <img src="{{ $t['src'] }}" alt="{{ $t['name'] }}">
                                <span>{{ $t['name'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        @endif

    </div>
</section>

<!-- ─── CTA ─── -->
<section class="stats-section py-5">
    <div class="container text-center">
        <h2 class="text-white fw-bold mb-3">Need a Custom Tech Solution?</h2>
        <p class="mb-4 cta-desc">
            We'll help you choose the right stack for your project.
        </p>
        <a href="{{ route('contact') }}" class="btn-hero-primary">Talk to an Expert</a>
    </div>
</section>

@include('layouts.footer')
