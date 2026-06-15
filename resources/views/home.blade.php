@include('layouts.header')

<section class="hero-section" id="home"
         style="background-image: linear-gradient(135deg,rgba(3,20,65,.92) 0%,rgba(3,47,103,.85) 60%,rgba(5,60,120,.80) 100%), url('{{ asset('assets/images/banner-bg1.jpg') }}');">

    <div class="container position-relative z-1">
        <div class="row align-items-center">

            <!-- Left Text -->
            <div class="col-lg-6 py-5">

                <h1 class="hero-title">
                    Delivering Innovative
                    <span class="highlight">IT Solutions</span>
                    for Your Business Growth
                </h1>

                <p class="hero-desc mt-4">
                    We build scalable, secure and high-performance digital
                    solutions that empower businesses to succeed in the
                    digital world.
                </p>

                <div class="mt-4 d-flex flex-wrap gap-3">
                    <a href="{{ route('services') }}" class="btn-hero-primary">Our Services</a>
                    <a href="{{ route('contact') }}"  class="btn-hero-outline">Contact Us</a>
                </div>

            </div>

            <!-- Right Logo / Illustration -->
            <div class="col-lg-6 text-center py-4">
                <img src="{{ asset('assets/images/logo-big.png') }}"
                     class="img-fluid"
                     style="max-height:480px; filter:drop-shadow(0 20px 60px rgba(0,0,0,.4));"
                     alt="Quin Info Solutions">
            </div>

        </div>
    </div>

    <!-- Wave separator -->
    <div class="hero-wave">
        <svg viewBox="0 0 1440 80" preserveAspectRatio="none"
             xmlns="http://www.w3.org/2000/svg" style="display:block;">
            <path d="M0,40 C360,100 1080,0 1440,40 L1440,80 L0,80 Z"
                  fill="#ffffff"/>
        </svg>
    </div>

</section>

<!-- ─── SERVICES SECTION ─── -->
<section class="services-section" id="services">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="section-title">Our Services</h2>
            <p class="section-sub mt-2">
                We provide end-to-end IT services to help businesses innovate,
                automate and grow with technology.
            </p>
        </div>

        <div class="row g-4">

            <!-- Web Development -->
            <div class="col-lg-3 col-md-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h5>Web Development</h5>
                    <p>We build responsive, fast and secure websites and web
                       applications tailored to your business needs.</p>
                    <a href="#" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- Mobile App Development -->
            <div class="col-lg-3 col-md-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-mobile-screen"></i>
                    </div>
                    <h5>Mobile App Development</h5>
                    <p>Native and cross-platform mobile apps that deliver
                       seamless user experiences.</p>
                    <a href="{{ route('services') }}" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- Cloud Solutions -->
            <div class="col-lg-3 col-md-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <h5>Cloud Solutions</h5>
                    <p>Scalable cloud infrastructure and solutions to optimize
                       performance and reduce costs.</p>
                    <a href="{{ route('services') }}" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- Software Solutions -->
            <div class="col-lg-3 col-md-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-gears"></i>
                    </div>
                    <h5>Software Solutions</h5>
                    <p>Custom software solutions designed to streamline your
                       business processes.</p>
                    <a href="{{ route('services') }}" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- ─── ABOUT SECTION ─── -->
<section class="about-section" id="about">
    <div class="container">
        <div class="row align-items-center g-5">

            <!-- Left Text -->
            <div class="col-lg-6">
                <p class="section-label">About Us</p>
                <h2 class="section-title">
                    We Are <span class="highlight">QUIN</span><br>
                    Info Solutions
                </h2>
                <p class="mt-3" style="color:#555; line-height:1.8; font-size:15px;">
                    We are a team of passionate technologists, designers and
                    problem-solvers dedicated to delivering innovative IT solutions
                    that drive real business value.
                </p>

                <div class="mt-4">
                    <div class="about-check-item">
                        <span class="about-check-icon"><i class="fas fa-check"></i></span>
                        Customer-Centric Approach
                    </div>
                    <div class="about-check-item">
                        <span class="about-check-icon"><i class="fas fa-check"></i></span>
                        Innovative &amp; Scalable Solutions
                    </div>
                    <div class="about-check-item">
                        <span class="about-check-icon"><i class="fas fa-check"></i></span>
                        Timely Delivery &amp; Reliable Support
                    </div>
                </div>

                <a href="{{ route('about') }}" class="btn-about mt-5">
                    Know More About Us
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Right Image -->
            <div class="col-lg-6">
                <div class="about-img-wrap">
                    <img src="{{ asset('assets/images/office.jpg') }}"
                         alt="Quin Info Solutions Office">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ─── STATS SECTION ─── -->
<section class="stats-section" id="stats">
    <div class="container">
        <div class="row g-4">

            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas fa-face-smile"></i></div>
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Happy Clients</div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas fa-rocket"></i></div>
                    <div class="stat-number">120+</div>
                    <div class="stat-label">Projects Delivered</div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas fa-users"></i></div>
                    <div class="stat-number">15+</div>
                    <div class="stat-label">Team Members</div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas fa-trophy"></i></div>
                    <div class="stat-number">5+</div>
                    <div class="stat-label">Years of Experience</div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ─── TECHNOLOGIES SECTION ─── -->
<section class="tech-section" id="technologies">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="section-title">Technologies We Work With</h2>
            <p class="section-sub mt-2">
                We use the latest technologies and tools to build
                robust and future-ready solutions.
            </p>
        </div>

        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-7 g-4 justify-content-center">

            <div class="col">
                <div class="tech-card">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" alt="HTML5">
                    <span>HTML5</span>
                </div>
            </div>

            <div class="col">
                <div class="tech-card">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" alt="CSS3">
                    <span>CSS3</span>
                </div>
            </div>

            <div class="col">
                <div class="tech-card">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" alt="JavaScript">
                    <span>JavaScript</span>
                </div>
            </div>

            <div class="col">
                <div class="tech-card">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg" alt="React">
                    <span>React</span>
                </div>
            </div>

            <div class="col">
                <div class="tech-card">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg" alt="Laravel">
                    <span>Laravel</span>
                </div>
            </div>

            <div class="col">
                <div class="tech-card">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP">
                    <span>PHP</span>
                </div>
            </div>

            <div class="col">
                <div class="tech-card">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" alt="MySQL">
                    <span>MySQL</span>
                </div>
            </div>

        </div>

        <div class="text-center mt-5">
            <a href="{{ route('technologies') }}" class="btn-view-all">
                View All Technologies
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

    </div>
</section>

@include('layouts.footer')