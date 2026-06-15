@include('layouts.header')
@include('layouts.page-banner', ['title' => 'About Us'])

<!-- ─── WHO WE ARE ─── -->
<section class="inner-section">
    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-6">
                <p class="section-label">Who We Are</p>
                <h2 class="section-title">We Are <span class="highlight">QUIN</span> Info Solutions</h2>
                <p class="mt-3" style="color:#555; line-height:1.8; font-size:15.5px;">
                    Founded with a passion for technology, Quin Info Solutions is a team of dedicated
                    professionals committed to delivering cutting-edge IT solutions. We combine creativity
                    with technical excellence to build digital products that create real impact.
                </p>
                <p class="mt-2" style="color:#555; line-height:1.8; font-size:15.5px;">
                    From startups to enterprises, we tailor our approach to meet the unique needs of
                    each client, ensuring every solution is scalable, secure, and future-ready.
                </p>
                <div class="row g-3 mt-3">
                    <div class="col-6 text-center p-3" style="background:#f8f9fc; border-radius:12px;">
                        <h3 class="fw-800" style="color:var(--primary); font-weight:800;">50+</h3>
                        <p class="mb-0" style="font-size:14px; color:#666;">Happy Clients</p>
                    </div>
                    <div class="col-6 text-center p-3" style="background:#f8f9fc; border-radius:12px;">
                        <h3 class="fw-800" style="color:var(--primary); font-weight:800;">120+</h3>
                        <p class="mb-0" style="font-size:14px; color:#666;">Projects Delivered</p>
                    </div>
                    <div class="col-6 text-center p-3" style="background:#f8f9fc; border-radius:12px;">
                        <h3 class="fw-800" style="color:var(--primary); font-weight:800;">15+</h3>
                        <p class="mb-0" style="font-size:14px; color:#666;">Team Members</p>
                    </div>
                    <div class="col-6 text-center p-3" style="background:#f8f9fc; border-radius:12px;">
                        <h3 class="fw-800" style="color:var(--primary); font-weight:800;">5+</h3>
                        <p class="mb-0" style="font-size:14px; color:#666;">Years Experience</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="about-img-wrap">
                    <img src="{{ asset('assets/images/office.jpg') }}" alt="Quin Info Solutions Office">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ─── OUR VALUES ─── -->
<section class="inner-section-alt">
    <div class="container">
        <div class="text-center mb-5">
            <p class="section-label">Our Values</p>
            <h2 class="section-title">What Drives Us</h2>
            <p class="section-sub mt-2">Our core values define who we are and how we work every day.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-bullseye"></i></div>
                    <h5>Customer First</h5>
                    <p>We put our clients at the center of everything we do, ensuring their success is our success.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-lightbulb"></i></div>
                    <h5>Innovation</h5>
                    <p>We embrace the latest technologies and creative thinking to craft forward-looking solutions.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-shield-halved"></i></div>
                    <h5>Integrity</h5>
                    <p>We operate with transparency and honesty, building long-lasting relationships based on trust.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-rocket"></i></div>
                    <h5>Excellence</h5>
                    <p>We strive for the highest standards in every project, delivering quality that exceeds expectations.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ─── CTA STRIP ─── -->
<section class="stats-section py-5">
    <div class="container text-center">
        <h2 class="text-white fw-bold mb-3">Ready to Work Together?</h2>
        <p class="mb-4" style="color:rgba(255,255,255,.75); font-size:16px;">
            Let's build something great. Reach out to our team today.
        </p>
        <a href="{{ route('contact') }}" class="btn-hero-primary">Contact Us Now</a>
    </div>
</section>

@include('layouts.footer')
