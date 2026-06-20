<footer class="site-footer">
    <div class="container">
        <div class="row g-5">

            {{-- Brand Column --}}
            <div class="col-lg-4 col-md-6">
                <img src="{{ asset('assets/images/logo.png') }}" class="footer-logo" alt="Quin Info Solutions">
                <p>
                    We build digital solutions that empower businesses to grow,
                    innovate and succeed in the digital world.
                </p>
                <div class="footer-social">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="Twitter / X"><i class="fab fa-x-twitter"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="col-lg-2 col-md-6 col-sm-6">
                <h6>Quick Links</h6>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li><a href="{{ route('technologies') }}">Technologies</a></li>
                    <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>

            {{-- Our Services --}}
            <div class="col-lg-3 col-md-6 col-sm-6">
                <h6>Our Services</h6>
                <ul class="footer-links">
                    <li><a href="{{ route('services') }}">Web Development</a></li>
                    <li><a href="{{ route('services') }}">Mobile App Development</a></li>
                    <li><a href="{{ route('services') }}">Cloud Solutions</a></li>
                    <li><a href="{{ route('services') }}">Software Solutions</a></li>
                    <li><a href="{{ route('services') }}">UI/UX Design</a></li>
                </ul>
            </div>

            {{-- Contact Info --}}
            <div class="col-lg-3 col-md-6">
                <h6>Contact Us</h6>
                <div class="footer-contact-item">
                    <i class="fas fa-phone"></i>
                    <span>+91 94953 70214</span>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>info@quininfosolutions.com</span>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-location-dot"></i>
                    <span>104, Kaloor, Kochi,<br>Kerala, India - 682017</span>
                </div>
            </div>

        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            © {{ date('Y') }} Quin Info Solutions. All Rights Reserved.
        </div>
    </div>

</footer>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

{{-- Custom JS (loaded after Bootstrap) --}}
<script src="{{ asset('js/main.js') }}"></script>

{{-- Page-level script stacks --}}
@stack('scripts')

</body>
</html>