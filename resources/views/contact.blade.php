@include('layouts.header')
@include('layouts.page-banner', ['title' => 'Contact Us'])

<!-- ─── CONTACT SECTION ─── -->
<section class="contact-section">
    <div class="container">

        <div class="text-center mb-5">
            <p class="section-label">Get In Touch</p>
            <h2 class="section-title">We'd Love to Hear From You</h2>
            <p class="section-sub mt-2">
                Whether you have a project in mind, a question, or just want to say hello —
                our team is here and happy to help.
            </p>
        </div>

        <div class="row g-4 align-items-start">

            <!-- ─── Contact Info Card ─── -->
            <div class="col-lg-4">
                <div class="contact-info-card">

                    <h4 class="fw-bold mb-4 contact-info-title">Contact Information</h4>

                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fas fa-phone"></i></div>
                        <div class="contact-info-text">
                            <h6>Phone</h6>
                            <p>+91 94953 70214</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fas fa-envelope"></i></div>
                        <div class="contact-info-text">
                            <h6>Email</h6>
                            <p>info@quininfosolutions.com</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fas fa-location-dot"></i></div>
                        <div class="contact-info-text">
                            <h6>Address</h6>
                            <p>104, Kaloor, Kochi,<br>Kerala, India - 682017</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fas fa-clock"></i></div>
                        <div class="contact-info-text">
                            <h6>Business Hours</h6>
                            <p>Mon – Sat: 9:00 AM – 6:00 PM</p>
                        </div>
                    </div>

                    <!-- Social Links -->
                    <div class="mt-4 pt-3 contact-social-wrap">
    <p class="contact-social-label">Follow us on</p>

    <div class="d-flex gap-2">
        <a href="https://www.facebook.com/profile.php?id=61591153374542"
           class="social-link-ct"
           target="_blank"
           rel="noopener noreferrer"
           aria-label="Facebook">
            <i class="fab fa-facebook-f"></i>
        </a>

        <a href="https://www.instagram.com/quininfosolutions"
           class="social-link-ct"
           target="_blank"
           rel="noopener noreferrer"
           aria-label="Instagram">
            <i class="fab fa-instagram"></i>
        </a>

        <a href="https://www.linkedin.com/in/quin-info-solutions-741490417"
           class="social-link-ct"
           target="_blank"
           rel="noopener noreferrer"
           aria-label="LinkedIn">
            <i class="fab fa-linkedin-in"></i>
        </a>

        <a href="https://x.com/Quinfosolution"
           class="social-link-ct"
           target="_blank"
           rel="noopener noreferrer"
           aria-label="X (Twitter)">
            <i class="fab fa-x-twitter"></i>
        </a>
    </div>
</div>

                </div>
            </div>

            <!-- ─── Contact Form ─── -->
            <div class="col-lg-8">
                <div class="contact-card">

                    <h4 class="fw-bold mb-1 contact-form-title">Send Us a Message</h4>
                    <p class="mb-4 contact-form-desc">
                        Fill out the form below and we'll respond within 24 hours.
                    </p>

                    {{-- Success Alert (Supports both SSR and AJAX) --}}
                    <div id="ajax-success-alert" class="alert-success-custom align-items-center gap-2 mb-4" style="display: {{ session('success') ? 'flex' : 'none' }};">
                        <i class="fas fa-circle-check alert-success-icon"></i>
                        <span id="ajax-success-msg">{{ session('success') }}</span>
                    </div>

                    {{-- Validation Errors (Supports both SSR and AJAX) --}}
                    <div id="ajax-error-alert" class="alert alert-danger rounded-3 mb-4" style="display: {{ $errors->any() ? 'block' : 'none' }};">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="fas fa-triangle-exclamation alert-danger-icon"></i>
                            <strong class="alert-danger-title">Please correct the errors below:</strong>
                        </div>
                        <ul id="ajax-error-list" class="mb-0 ps-3 alert-danger-list">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>

                    <form action="{{ route('contact.submit') }}" method="POST" id="contactForm" novalidate>
                        @csrf

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label for="name" class="form-label">
                                    Full Name <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       id="name"
                                       name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Your full name"
                                       value="{{ old('name') }}"
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">
                                    Email Address <span class="text-danger">*</span>
                                </label>
                                <input type="email"
                                       id="email"
                                       name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       placeholder="your@email.com"
                                       value="{{ old('email') }}"
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel"
                                        id="phone"
                                        name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        placeholder="+91 00000 00000"
                                        value="{{ old('phone') }}">
                                 @error('phone')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                 @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="subject" class="form-label">Subject</label>
                                <select id="subject" name="subject"
                                        class="form-select @error('subject') is-invalid @enderror">
                                    <option value="" disabled {{ old('subject') ? '' : 'selected' }}>Select a subject</option>
                                    <option value="Web Development"         {{ old('subject') == 'Web Development'         ? 'selected' : '' }}>Web Development</option>
                                    <option value="Mobile App Development"  {{ old('subject') == 'Mobile App Development'  ? 'selected' : '' }}>Mobile App Development</option>
                                    <option value="Cloud Solutions"         {{ old('subject') == 'Cloud Solutions'         ? 'selected' : '' }}>Cloud Solutions</option>
                                    <option value="Software Solutions"      {{ old('subject') == 'Software Solutions'      ? 'selected' : '' }}>Software Solutions</option>
                                    <option value="UI/UX Design"            {{ old('subject') == 'UI/UX Design'            ? 'selected' : '' }}>UI/UX Design</option>
                                    <option value="Digital Marketing"       {{ old('subject') == 'Digital Marketing'       ? 'selected' : '' }}>Digital Marketing</option>
                                    <option value="IT Consulting"           {{ old('subject') == 'IT Consulting'           ? 'selected' : '' }}>IT Consulting</option>
                                    <option value="Cybersecurity Services"  {{ old('subject') == 'Cybersecurity Services'  ? 'selected' : '' }}>Cybersecurity Services</option>
                                    <option value="E-Commerce Solutions"    {{ old('subject') == 'E-Commerce Solutions'    ? 'selected' : '' }}>E-Commerce Solutions</option>
                                    <option value="Support & Maintenance"   {{ old('subject') == 'Support & Maintenance'   ? 'selected' : '' }}>Support & Maintenance</option>
                                    <option value="Emerging Technologies"   {{ old('subject') == 'Emerging Technologies'   ? 'selected' : '' }}>Emerging Technologies</option>
                                    <option value="General Inquiry"         {{ old('subject') == 'General Inquiry'         ? 'selected' : '' }}>General Inquiry</option>
                                    <option value="Other"                   {{ old('subject') == 'Other'                   ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="reference_name" class="form-label">Reference Name</label>
                                <input type="text"
                                       id="reference_name"
                                       name="reference_name"
                                       class="form-control @error('reference_name') is-invalid @enderror"
                                       placeholder="Who referred you?"
                                       value="{{ old('reference_name') }}">
                                @error('reference_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="message" class="form-label">
                                    Message <span class="text-danger">*</span>
                                </label>
                                <textarea id="message"
                                          name="message"
                                          rows="6"
                                          class="form-control @error('message') is-invalid @enderror"
                                          placeholder="Tell us about your project or inquiry..."
                                          required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- CAPTCHA Field -->
                            <div class="col-12 mt-3">
                                <label for="captcha" class="form-label">
                                    Verification Code <span class="text-danger">*</span>
                                </label>
                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <div class="captcha-img-container captcha-img-wrap">
                                        <img src="{{ route('captcha.image') }}" alt="CAPTCHA" id="captcha-img" width="140" height="42" class="captcha-img">
                                    </div>
                                    <button type="button" class="btn btn-outline-secondary captcha-refresh-btn" id="refresh-captcha" data-refresh-url="{{ route('captcha.refresh') }}" title="Refresh CAPTCHA">
                                        <i class="fas fa-arrows-rotate" id="refresh-icon"></i>
                                    </button>
                                    <div class="flex-grow-1 captcha-input-wrap">
                                        <input type="text"
                                               id="captcha"
                                               name="captcha"
                                               class="form-control captcha-input @error('captcha') is-invalid @enderror"
                                               placeholder="Enter 5-character code"
                                               required
                                               autocomplete="off">
                                        @error('captcha')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <button type="submit" class="btn-submit" id="submitBtn">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    Send Message
                                </button>
                            </div>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- ─── MAP SECTION ─── -->
<section class="map-section">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d982.3160884424791!2d76.29157876099636!3d9.995008821036155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1782040919130!5m2!1sen!2sin"
        width="100%"
        height="380"
        class="map-iframe"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        title="Quin Info Solutions Location">
    </iframe>
</section>
@push('scripts')
<script src="{{ asset('js/contact.js') }}" defer></script>
@endpush

@include('layouts.footer')
