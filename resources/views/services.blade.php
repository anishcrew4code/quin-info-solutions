@include('layouts.header')
@include('layouts.page-banner', ['title' => 'Our Services'])

<!-- ─── SERVICES GRID ─── -->
<section class="inner-section">
    <div class="container">
        <div class="text-center mb-5">
            <p class="section-label">What We Offer</p>
            <h2 class="section-title">End-to-End IT Services</h2>
            <p class="section-sub mt-2">
                We provide comprehensive technology solutions tailored to help your business innovate, automate, and grow.
            </p>
        </div>

        @if($services->count())
            <div class="row g-4">
                @foreach($services as $service)
                    <div class="col-lg-3 col-md-6">
                        <div class="service-card text-center">
                            <div class="service-icon">
                                <i class="{{ $service->icon ?? 'fas fa-cogs' }}"></i>
                            </div>
                            <h5 class="mt-3">{{ $service->title }}</h5>
                            <p>{{ $service->description }}</p>
                            <a href="{{ route('contact') }}" class="learn-more">Get a Quote <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            {{-- Fallback static cards when no DB records --}}
            <div class="row g-4">

                <div class="col-lg-3 col-md-6">
                    <div class="service-card text-center">
                        <div class="service-icon"><i class="fas fa-code"></i></div>
                        <h5>Web Development</h5>
                        <p>We build responsive, fast and secure websites and web applications tailored to your business needs.</p>
                        <a href="{{ route('contact') }}" class="learn-more">Get a Quote <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="service-card text-center">
                        <div class="service-icon"><i class="fas fa-mobile-screen"></i></div>
                        <h5>Mobile App Development</h5>
                        <p>Native and cross-platform mobile apps that deliver seamless and engaging user experiences.</p>
                        <a href="{{ route('contact') }}" class="learn-more">Get a Quote <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="service-card text-center">
                        <div class="service-icon"><i class="fas fa-cloud"></i></div>
                        <h5>Cloud Solutions</h5>
                        <p>Scalable cloud infrastructure and managed services to optimize performance and reduce costs.</p>
                        <a href="{{ route('contact') }}" class="learn-more">Get a Quote <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="service-card text-center">
                        <div class="service-icon"><i class="fas fa-gears"></i></div>
                        <h5>Software Solutions</h5>
                        <p>Custom enterprise software solutions designed to streamline and automate your business processes.</p>
                        <a href="{{ route('contact') }}" class="learn-more">Get a Quote <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="service-card text-center">
                        <div class="service-icon"><i class="fas fa-palette"></i></div>
                        <h5>UI/UX Design</h5>
                        <p>Beautiful, intuitive interfaces crafted to deliver exceptional digital experiences for your users.</p>
                        <a href="{{ route('contact') }}" class="learn-more">Get a Quote <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="service-card text-center">
                        <div class="service-icon"><i class="fas fa-database"></i></div>
                        <h5>Database Management</h5>
                        <p>Robust database design, optimization, and management to keep your data secure and accessible.</p>
                        <a href="{{ route('contact') }}" class="learn-more">Get a Quote <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="service-card text-center">
                        <div class="service-icon"><i class="fas fa-shield-halved"></i></div>
                        <h5>Cybersecurity</h5>
                        <p>Comprehensive security audits and solutions to protect your digital assets from threats.</p>
                        <a href="{{ route('contact') }}" class="learn-more">Get a Quote <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="service-card text-center">
                        <div class="service-icon"><i class="fas fa-magnifying-glass-chart"></i></div>
                        <h5>SEO & Digital Marketing</h5>
                        <p>Data-driven strategies to boost your online visibility and drive quality traffic to your business.</p>
                        <a href="{{ route('contact') }}" class="learn-more">Get a Quote <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

            </div>
        @endif

    </div>
</section>

<!-- ─── WHY CHOOSE US ─── -->
<section class="inner-section-alt">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <p class="section-label">Why Choose Us</p>
                <h2 class="section-title">We Deliver Results, <span class="highlight">Not Just Code</span></h2>
                <p class="mt-3" style="color:#555; line-height:1.8;">
                    With years of hands-on experience, our team ensures that every solution is built
                    to scale, performs flawlessly, and aligns with your business goals.
                </p>
                <div class="mt-4">
                    @foreach([
                        ['icon'=>'fa-check-circle','text'=>'Experienced & Certified Team'],
                        ['icon'=>'fa-check-circle','text'=>'On-Time Delivery Guarantee'],
                        ['icon'=>'fa-check-circle','text'=>'Transparent Communication'],
                        ['icon'=>'fa-check-circle','text'=>'Post-Launch Support & Maintenance'],
                        ['icon'=>'fa-check-circle','text'=>'Agile Development Methodology'],
                    ] as $item)
                        <div class="about-check-item">
                            <span class="about-check-icon"><i class="fas fa-check"></i></span>
                            {{ $item['text'] }}
                        </div>
                    @endforeach
                </div>
                <a href="{{ route('contact') }}" class="btn-about mt-4">
                    Get a Free Consultation <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-lg-7">
                <div class="row g-3">
                    @foreach([
                        ['num'=>'100%','label'=>'Client Satisfaction'],
                        ['num'=>'48h','label'=>'Response Time'],
                        ['num'=>'10+','label'=>'Technologies'],
                        ['num'=>'24/7','label'=>'Support Available'],
                    ] as $stat)
                        <div class="col-6">
                            <div class="text-center p-4" style="background:#fff; border-radius:14px; box-shadow:0 4px 14px rgba(0,0,0,.06);">
                                <h2 style="color:var(--primary); font-weight:800; font-size:36px;">{{ $stat['num'] }}</h2>
                                <p class="mb-0" style="color:#666; font-size:14px; font-weight:500;">{{ $stat['label'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ─── CTA ─── -->
<section class="stats-section py-5">
    <div class="container text-center">
        <h2 class="text-white fw-bold mb-3">Have a Project in Mind?</h2>
        <p class="mb-4" style="color:rgba(255,255,255,.75); font-size:16px;">
            Let's discuss how we can bring your vision to life.
        </p>
        <a href="{{ route('contact') }}" class="btn-hero-primary">Start a Conversation</a>
    </div>
</section>

@include('layouts.footer')
