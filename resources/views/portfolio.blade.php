@include('layouts.header')
@include('layouts.page-banner', ['title' => 'Portfolio'])

<!-- ─── PORTFOLIO GRID ─── -->
<section class="inner-section">
    <div class="container">

        <div class="text-center mb-5">
            <p class="section-label">Our Work</p>
            <h2 class="section-title">Projects We're Proud Of</h2>
            <p class="section-sub mt-2">
                A showcase of our best work across diverse industries and platforms.
            </p>
        </div>

        @if($portfolios->count())
            <div class="row g-4">
                @foreach($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6">
                        <div class="portfolio-card">
                            @if($portfolio->image)
                                <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}">
                            @else
                                <div style="height:220px; background:linear-gradient(135deg,#032f67,#0a4a9e); display:flex; align-items:center; justify-content:center;">
                                    <i class="fas fa-laptop-code" style="font-size:48px; color:rgba(255,255,255,.3);"></i>
                                </div>
                            @endif
                            <div class="portfolio-card-body">
                                <h5>{{ $portfolio->title }}</h5>
                                @if($portfolio->description)
                                    <p>{{ Str::limit($portfolio->description, 100) }}</p>
                                @endif
                                @if($portfolio->url)
                                    <a href="{{ $portfolio->url }}" target="_blank" class="portfolio-link">
                                        View Project <i class="fas fa-arrow-right"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            {{-- Static placeholder portfolio items --}}
            <div class="row g-4">
                @foreach([
                    ['title'=>'E-Commerce Platform','cat'=>'Web Development','color'=>'#032f67'],
                    ['title'=>'Healthcare Mobile App','cat'=>'Mobile App','color'=>'#0a4a9e'],
                    ['title'=>'Corporate Dashboard','cat'=>'Software Solution','color'=>'#1565c0'],
                    ['title'=>'Cloud Migration Project','cat'=>'Cloud Solutions','color'=>'#032f67'],
                    ['title'=>'Restaurant Booking App','cat'=>'Mobile App','color'=>'#0a4a9e'],
                    ['title'=>'Real Estate Portal','cat'=>'Web Development','color'=>'#1565c0'],
                ] as $p)
                    <div class="col-lg-4 col-md-6">
                        <div class="portfolio-card">
                            <div style="height:220px; background:linear-gradient(135deg,{{ $p['color'] }},{{ $p['color'] }}aa); display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                <i class="fas fa-laptop-code" style="font-size:48px; color:rgba(255,255,255,.35); margin-bottom:10px;"></i>
                                <span style="color:rgba(255,255,255,.6); font-size:12px; font-weight:600; text-transform:uppercase; letter-spacing:1px;">{{ $p['cat'] }}</span>
                            </div>
                            <div class="portfolio-card-body">
                                <h5>{{ $p['title'] }}</h5>
                                <p>A fully custom solution built to meet specific client requirements with modern technologies and best practices.</p>
                                <a href="{{ route('contact') }}" class="portfolio-link">Request Similar <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</section>

<!-- ─── CTA ─── -->
<section class="stats-section py-5">
    <div class="container text-center">
        <h2 class="text-white fw-bold mb-3">Got a Project Idea?</h2>
        <p class="mb-4" style="color:rgba(255,255,255,.75); font-size:16px;">
            Let's build something amazing together.
        </p>
        <a href="{{ route('contact') }}" class="btn-hero-primary">Let's Talk</a>
    </div>
</section>

@include('layouts.footer')
