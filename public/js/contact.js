document.addEventListener('DOMContentLoaded', () => {
    const refreshBtn = document.getElementById('refresh-captcha');
    const contactForm = document.getElementById('contactForm');

    // Helper to refresh CAPTCHA dynamically
    function triggerCaptchaRefresh() {
        if (!refreshBtn) return;
        const refreshUrl = refreshBtn.getAttribute('data-refresh-url');
        const img = document.getElementById('captcha-img');
        const icon = document.getElementById('refresh-icon');
        
        if (!img || !refreshUrl) return;
        
        icon?.classList.add('fa-spin');
        
        fetch(refreshUrl)
            .then(response => response.json())
            .then(data => {
                img.src = data.url;
                setTimeout(() => {
                    icon?.classList.remove('fa-spin');
                }, 400);
            })
            .catch(err => {
                console.error('Failed to refresh captcha:', err);
                icon?.classList.remove('fa-spin');
            });
    }

    // Refresh CAPTCHA click event listener
    refreshBtn?.addEventListener('click', triggerCaptchaRefresh);

    // Dynamic AJAX form submit handler
    contactForm?.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        
        // Use browser HTML5 validation checks first
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const btn = document.getElementById('submitBtn');
        if (!btn) return;
        const originalBtnHtml = btn.innerHTML;
        
        // Set loading state
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';

        // Clear existing validation styles
        form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        form.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');
        
        // Hide top alert components
        const successAlert = document.getElementById('ajax-success-alert');
        const errorAlert = document.getElementById('ajax-error-alert');
        if (successAlert) successAlert.style.display = 'none';
        if (errorAlert) errorAlert.style.display = 'none';

        // Pack form data
        const formData = new FormData(form);

        // Submit via AJAX Fetch
        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => {
            return response.json().then(data => {
                if (!response.ok) {
                    if (response.status === 422) {
                        throw { type: 'validation', errors: data.errors };
                    } else {
                        throw { type: 'general', message: data.message || 'An error occurred. Please try again.' };
                    }
                }
                return data;
            });
        })
        .then(data => {
            // Display success alert
            const successMsg = document.getElementById('ajax-success-msg');
            if (successMsg) successMsg.textContent = data.message || 'Your message has been sent successfully!';
            if (successAlert) successAlert.style.display = 'flex';
            
            // Clear input inputs
            form.reset();
            
            // Re-enable and reset button
            btn.disabled = false;
            btn.innerHTML = originalBtnHtml;

            // Load a fresh CAPTCHA code
            triggerCaptchaRefresh();
            
            // Scroll smoothly to alerts container
            document.querySelector('.contact-card')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
        })
        .catch(err => {
            // Re-enable submit button
            btn.disabled = false;
            btn.innerHTML = originalBtnHtml;

            // Generate fresh CAPTCHA on failure so previous input cannot be brute forced
            triggerCaptchaRefresh();

            if (err.type === 'validation') {
                const errorList = document.getElementById('ajax-error-list');
                
                // Reset errors bullet list
                if (errorList) errorList.innerHTML = '';
                
                // Show errors dynamically under each field
                for (const field in err.errors) {
                    const messages = err.errors[field];
                    const input = document.getElementById(field);
                    
                    if (input) {
                        input.classList.add('is-invalid');
                        
                        // Locate error description element (usually sibling, or inside flex-container parent)
                        let feedback = input.nextElementSibling;
                        if (!feedback || !feedback.classList.contains('invalid-feedback')) {
                            feedback = input.parentElement.querySelector('.invalid-feedback');
                        }
                        
                        if (feedback) {
                            feedback.textContent = messages[0];
                        }
                    }

                    // Populate top list
                    if (errorList) {
                        messages.forEach(msg => {
                            const li = document.createElement('li');
                            li.textContent = msg;
                            errorList.appendChild(li);
                        });
                    }
                }
                
                if (errorAlert) errorAlert.style.display = 'block';
            } else {
                // Display general system/server error
                const errorList = document.getElementById('ajax-error-list');
                
                if (errorList) {
                    errorList.innerHTML = '';
                    const li = document.createElement('li');
                    li.textContent = err.message || 'An internal error occurred. Please try again later.';
                    errorList.appendChild(li);
                }
                
                if (errorAlert) errorAlert.style.display = 'block';
            }
            
            // Scroll smoothly to alert container
            document.querySelector('.contact-card')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });
});
