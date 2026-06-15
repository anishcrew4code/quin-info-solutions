{{-- Reusable inner page hero banner --}}
<section class="page-banner"
         style="background-image: linear-gradient(135deg,rgba(3,20,65,.93) 0%,rgba(3,47,103,.88) 100%), url('{{ asset('assets/images/banner-bg1.jpg') }}');">
    <div class="container text-center">
        <h1 class="page-banner-title">{{ $title }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
        </nav>
    </div>
</section>
