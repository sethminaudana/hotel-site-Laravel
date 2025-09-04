        // Show address name error on page load (as shown in the image)
        document.addEventListener('DOMContentLoaded', function() {
            const addressNameGroup = document.querySelector('#addressName').closest('.form-group');
            const errorMessage = document.getElementById('addressNameError');
            
            addressNameGroup.classList.add('error');
            errorMessage.style.display = 'block';
        });

        // Form validation
        document.getElementById('profileForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Reset all errors
            document.querySelectorAll('.form-group').forEach(group => {
                group.classList.remove('error');
            });
            document.querySelectorAll('.error-message').forEach(msg => {
                msg.style.display = 'none';
            });

            let hasErrors = false;

            // Validate required fields
            const requiredFields = ['firstName', 'lastName', 'mobile', 'email', 'confirmEmail', 'addressName', 'country', 'address1', 'city', 'postal'];
            
            requiredFields.forEach(fieldName => {
                const field = document.getElementById(fieldName);
                if (!field.value.trim()) {
                    const group = field.closest('.form-group');
                    group.classList.add('error');
                    hasErrors = true;
                }
            });

            // Validate email match
            const email = document.getElementById('email').value;
            const confirmEmail = document.getElementById('confirmEmail').value;
            
            if (email && confirmEmail && email !== confirmEmail) {
                const group = document.getElementById('confirmEmail').closest('.form-group');
                group.classList.add('error');
                hasErrors = true;
            }

            if (!hasErrors) {
                // Show success message
                const btn = document.querySelector('.btn');
                const originalText = btn.textContent;
                btn.textContent = 'Profile Updated!';
                btn.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
                
                setTimeout(() => {
                    btn.textContent = originalText;
                    btn.style.background = 'linear-gradient(135deg, var(--bd-theme-5) 0%, var(--bd-theme-1) 100%)';
                }, 2000);
            }
        });

        // Real-time validation
        document.querySelectorAll('input, select').forEach(field => {
            field.addEventListener('blur', function() {
                const group = this.closest('.form-group');
                
                if (this.hasAttribute('required') && !this.value.trim()) {
                    group.classList.add('error');
                } else {
                    group.classList.remove('error');
                }
            });

            field.addEventListener('input', function() {
                const group = this.closest('.form-group');
                if (this.value.trim()) {
                    group.classList.remove('error');
                }
            });
        });

        // Email confirmation validation
        document.getElementById('confirmEmail').addEventListener('input', function() {
            const email = document.getElementById('email').value;
            const confirmEmail = this.value;
            const group = this.closest('.form-group');
            
            if (confirmEmail && email !== confirmEmail) {
                group.classList.add('error');
            } else {
                group.classList.remove('error');
            }
        });