
@extends('layout.app')

{{-- <div class="container">
        <h1 class="page-title">Your Profile</h1>
        
        <form id="profileForm">
            <div class="section">
                <h2 class="section-title">Profile Information</h2>
                <div class="required-note">
                    <span class="required-asterisk">*</span> Required
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="firstName">First Name <span class="required-asterisk">*</span></label>
                        <input type="text" id="firstName" name="firstName" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="lastName">Last Name <span class="required-asterisk">*</span></label>
                        <input type="text" id="lastName" name="lastName" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone">
                    </div>
                    
                    <div class="form-group">
                        <label for="mobile">Mobile Phone <span class="required-asterisk">*</span></label>
                        <input type="tel" id="mobile" name="mobile" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address <span class="required-asterisk">*</span></label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirmEmail">Confirm Email Address <span class="required-asterisk">*</span></label>
                        <input type="email" id="confirmEmail" name="confirmEmail" required>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2 class="section-title">Address</h2>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="addressName">Name (E.g., Home, Work) <span class="required-asterisk">*</span></label>
                        <input type="text" id="addressName" name="addressName" required>
                        <div class="error-message" id="addressNameError" style="display: none;">
                            Error: Address name is required.
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="country">Country <span class="required-asterisk">*</span></label>
                        <select id="country" name="country" required>
                            <option value="">Select Country</option>
                            <option value="LK" selected>Sri Lanka</option>
                            <option value="IN">India</option>
                            <option value="US">United States</option>
                            <option value="UK">United Kingdom</option>
                            <option value="AU">Australia</option>
                            <option value="CA">Canada</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="address1">Address 1 <span class="required-asterisk">*</span></label>
                        <input type="text" id="address1" name="address1" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="address2">Address 2</label>
                        <input type="text" id="address2" name="address2">
                    </div>
                    
                    <div class="form-group">
                        <label for="city">City <span class="required-asterisk">*</span></label>
                        <input type="text" id="city" name="city" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="postal">ZIP/Postal Code <span class="required-asterisk">*</span></label>
                        <input type="text" id="postal" name="postal" required>
                    </div>
                </div>
            </div>

            <div class="submit-section">
                <button type="submit" class="btn">Update Profile</button>
            </div>
        </form>
    </div> --}}

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinnamon Hotels - Member Portal</title>
    <style>
        :root {
            --bd-common-white: #FFFFFF;
            --bd-common-black: #000000;
            --bd-heading-primary: #000000;
            --bd-grey-1: #D9D9D9;
            --bd-grey-2: #E9CFCF;
            --bd-grey-3: #6C6C6C;
            --bd-text-body: #424242;
            --bd-text-1: #000000;
            --bd-text-2: #414141;
            --bd-theme-1: #EEC78C;
            --bd-theme-2: #F8F5F0;
            --bd-theme-3: #F9F5F0;
            --bd-theme-4: #FFF8EB;
            --bd-theme-5: #FFA455;
            --bd-theme-6: #FFF6EB;
            --bd-theme-7: #EBFFFE;
            --bd-theme-8: #FFECD6;
            --bd-theme-9: #FF7C7C;
            --bd-theme-10: #7C81FF;
            --bd-theme-11: #00B9F1;
        }

      
        .app-container {
            position: relative;
            width: 100%;
            min-height: 100vh;
        }

        /* Navigation */
        .nav-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            display: flex;
            gap: 10px;
        }

        .nav-btn {
            background: rgba(255, 255, 255, 0.95);
            border: 2px solid var(--bd-theme-5);
            color: var(--bd-theme-5);
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            font-size: 0.9rem;
        }

        .nav-btn:hover {
            background: var(--bd-theme-5);
            color: var(--bd-common-white);
            transform: scale(1.05);
        }

        .nav-btn.active {
            background: var(--bd-theme-5);
            color: var(--bd-common-white);
        }

        /* Page transitions */
        .page {
            margin-top: 200px;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            min-height: 100vh;
            opacity: 0;
            transform: translateX(100px);
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: none;
        }

        .page.active {
            opacity: 1;
            transform: translateX(0);
            pointer-events: all;
        }

        .page.prev {
            opacity: 0;
            transform: translateX(-100px);
        }

        /* Login Page Styles */
        .login-page {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: linear-gradient(135deg, var(--bd-theme-4) 0%, var(--bd-theme-6) 100%);
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            background: var(--bd-common-white);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
        }

        .login-header h1 {
            color: var(--bd-theme-10);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .login-header p {
            color: var(--bd-text-2);
            font-size: 0.9rem;
            margin-bottom: 30px;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .login-input {
            padding: 14px 18px;
            border: 2px solid var(--bd-grey-1);
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--bd-common-white);
            color: var(--bd-text-1);
        }

        .login-input:focus {
            outline: none;
            border-color: var(--bd-theme-5);
            box-shadow: 0 0 0 3px rgba(255, 164, 85, 0.1);
            transform: translateY(-2px);
        }

        .login-input::placeholder {
            color: var(--bd-grey-3);
        }

        .forgot-password {
            text-align: right;
            margin: 10px 0;
        }

        .forgot-password a {
            color: var(--bd-theme-5);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: var(--bd-theme-1);
        }

        .login-btn {
            padding: 16px;
            background: linear-gradient(135deg, var(--bd-theme-5) 0%, var(--bd-theme-1) 100%);
            color: var(--bd-common-white);
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 10px;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 164, 85, 0.3);
        }

        .not-member {
            margin-top: 20px;
            color: var(--bd-text-2);
            font-size: 0.9rem;
        }

        .not-member a {
            color: var(--bd-theme-5);
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
        }

        .not-member a:hover {
            color: var(--bd-theme-1);
        }

        /* Profile Page Styles */
        .profile-page {
            padding: 80px 20px 40px;
            background: linear-gradient(135deg, var(--bd-theme-2) 0%, var(--bd-theme-3) 100%);
            min-height: 100vh;
        }

        .profile-container {
            max-width: 800px;
            margin: 0 auto;
            background: var(--bd-common-white);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }

        .page-title {
            color: var(--bd-theme-10);
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 40px;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-align: center;
        }

        .section {
            margin-bottom: 40px;
        }

        .section-title {
            color: var(--bd-theme-10);
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 25px;
            letter-spacing: 1px;
            text-transform: uppercase;
            border-bottom: 2px solid var(--bd-grey-1);
            padding-bottom: 10px;
        }

        .required-note {
            text-align: right;
            margin-bottom: 20px;
            color: var(--bd-text-2);
            font-size: 0.9rem;
        }

        .required-asterisk {
            color: var(--bd-theme-9);
            font-weight: bold;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            color: var(--bd-text-1);
            font-size: 1rem;
            font-weight: 500;
            margin-bottom: 8px;
            padding-left: 5px;
        }

        .form-group input,
        .form-group select {
            padding: 12px 16px;
            border: 2px solid var(--bd-grey-1);
            border-radius: 4px;
            font-size: 1rem;
            background: var(--bd-common-white);
            color: var(--bd-text-1);
            transition: all 0.3s ease;
            min-height: 48px;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--bd-theme-5);
            box-shadow: 0 0 0 3px rgba(255, 164, 85, 0.1);
        }

        .form-group select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6,9 12,15 18,9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 20px;
            cursor: pointer;
        }

        .error-message {
            background-color: #dc3545;
            color: var(--bd-common-white);
            padding: 12px 16px;
            border-radius: 4px;
            font-size: 0.9rem;
            font-weight: 500;
            margin-top: 5px;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-group.error input,
        .form-group.error select {
            border-color: #dc3545;
            box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1);
        }

        .submit-section {
            margin-top: 40px;
            text-align: center;
        }

        .btn {
            background: linear-gradient(135deg, var(--bd-theme-5) 0%, var(--bd-theme-1) 100%);
            color: var(--bd-common-white);
            border: none;
            padding: 16px 40px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            min-width: 200px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 164, 85, 0.3);
        }

        .btn:active {
            transform: translateY(0);
        }

        /* Loading animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
            margin-right: 10px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Page transition animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeInUp 0.6s ease forwards;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .profile-container {
                padding: 20px;
                margin: 10px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .page-title {
                font-size: 2rem;
            }

            .section-title {
                font-size: 1.4rem;
            }

            .nav-container {
                position: static;
                justify-content: center;
                padding: 20px;
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
            }
        }

        /* Success message */
        .success-message {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: var(--bd-common-white);
            padding: 16px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
            animation: slideDown 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="app-container">
        <!-- Navigation -->
        {{-- <div class="nav-container">
            <button class="nav-btn active" onclick="showPage('login')" id="loginNav">Login</button>
            <button class="nav-btn" onclick="showPage('profile')" id="profileNav">Profile</button>
        </div> --}}

        <!-- Login Page -->
        <div class="page login-page active" id="loginPage">
            <div class="login-container">
                <div class="login-header">
                    <h1>Member Sign In</h1>
                    <p>Sign in with your username and password</p>
                </div>
                <form class="login-form" id="loginForm">
                    <input type="text" class="login-input" name="username" placeholder="Username" required>
                    <input type="password" class="login-input" name="password" placeholder="Password" required>
                    
                    <div class="forgot-password">
                        <a href="#" onclick="showForgotPassword()">Forgot Password?</a>
                    </div>
                    
                    <button type="submit" class="login-btn">Login</button>
                    
                    <div class="not-member">
                        <p>Not a member yet? <a onclick="showPage('profile')">Create your profile</a></p>
                    </div>
                </form>
            </div>
        </div>

        <!-- Profile Page -->
        <div class="page profile-page" id="profilePage">
            <div class="profile-container">
                <h1 class="page-title">Your Profile</h1>
                
                <form id="profileForm">
                    <div class="section">
                        <h2 class="section-title">Profile Information</h2>
                        <div class="required-note">
                            <span class="required-asterisk">*</span> Required
                        </div>
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="firstName">First Name <span class="required-asterisk">*</span></label>
                                <input type="text" id="firstName" name="firstName" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="lastName">Last Name <span class="required-asterisk">*</span></label>
                                <input type="text" id="lastName" name="lastName" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" id="phone" name="phone">
                            </div>
                            
                            <div class="form-group">
                                <label for="mobile">Mobile Phone <span class="required-asterisk">*</span></label>
                                <input type="tel" id="mobile" name="mobile" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email Address <span class="required-asterisk">*</span></label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="confirmEmail">Confirm Email Address <span class="required-asterisk">*</span></label>
                                <input type="email" id="confirmEmail" name="confirmEmail" required>
                            </div>
                        </div>
                    </div>

                    <div class="section">
                        <h2 class="section-title">Address</h2>
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="addressName">Name (E.g., Home, Work) <span class="required-asterisk">*</span></label>
                                <input type="text" id="addressName" name="addressName" required>
                                <div class="error-message" id="addressNameError" style="display: none;">
                                    Error: Address name is required.
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="country">Country <span class="required-asterisk">*</span></label>
                                <select id="country" name="country" required>
                                    <option value="">Select Country</option>
                                    <option value="LK" selected>Sri Lanka</option>
                                    <option value="IN">India</option>
                                    <option value="US">United States</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="AU">Australia</option>
                                    <option value="CA">Canada</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="address1">Address 1 <span class="required-asterisk">*</span></label>
                                <input type="text" id="address1" name="address1" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="address2">Address 2</label>
                                <input type="text" id="address2" name="address2">
                            </div>
                            
                            <div class="form-group">
                                <label for="city">City <span class="required-asterisk">*</span></label>
                                <input type="text" id="city" name="city" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="postal">ZIP/Postal Code <span class="required-asterisk">*</span></label>
                                <input type="text" id="postal" name="postal" required>
                            </div>
                        </div>
                    </div>

                    <div class="submit-section">
                        <button type="submit" class="btn">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let currentPage = 'login';

        // Page transition function
        function showPage(pageName) {
            const pages = document.querySelectorAll('.page');
            const navBtns = document.querySelectorAll('.nav-btn');
            
            // Remove active classes
            pages.forEach(page => {
                page.classList.remove('active', 'prev');
                if (page.classList.contains('active')) {
                    page.classList.add('prev');
                }
            });
            
            navBtns.forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Add active classes with smooth transition
            setTimeout(() => {
                document.getElementById(pageName + 'Page').classList.add('active');
                document.getElementById(pageName + 'Nav').classList.add('active');
                currentPage = pageName;
                
                // Trigger animations
                if (pageName === 'profile') {
                    document.querySelector('.profile-container').classList.add('fade-in');
                }
            }, 50);
        }

        // Login form handling
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const btn = this.querySelector('.login-btn');
            const originalText = btn.innerHTML;
            
            // Show loading state
            btn.innerHTML = '<span class="loading"></span>Signing In...';
            btn.disabled = true;
            
            // Simulate login process
            setTimeout(() => {
                // Show success and redirect to profile
                btn.innerHTML = 'Success!';
                btn.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
                
                setTimeout(() => {
                    showPage('profile');
                    
                    // Reset button
                    setTimeout(() => {
                        btn.innerHTML = originalText;
                        btn.style.background = 'linear-gradient(135deg, var(--bd-theme-5) 0%, var(--bd-theme-1) 100%)';
                        btn.disabled = false;
                    }, 1000);
                }, 1000);
            }, 2000);
        });

        // Show address name error on profile page load
        function showProfileErrors() {
            const addressNameGroup = document.querySelector('#addressName').closest('.form-group');
            const errorMessage = document.getElementById('addressNameError');
            
            addressNameGroup.classList.add('error');
            errorMessage.style.display = 'block';
        }

        // Profile form validation
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
                
                // Add success message
                const successMsg = document.createElement('div');
                successMsg.className = 'success-message';
                successMsg.textContent = 'Profile updated successfully!';
                
                btn.parentElement.insertBefore(successMsg, btn);
                
                btn.innerHTML = '<span class="loading"></span>Updating...';
                btn.disabled = true;
                
                setTimeout(() => {
                    btn.textContent = 'Profile Updated!';
                    btn.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
                    
                    setTimeout(() => {
                        btn.textContent = originalText;
                        btn.style.background = 'linear-gradient(135deg, var(--bd-theme-5) 0%, var(--bd-theme-1) 100%)';
                        btn.disabled = false;
                        successMsg.remove();
                    }, 3000);
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

        // Forgot password function
        function showForgotPassword() {
            alert('Forgot password functionality would be implemented here.');
        }

        // Initialize - show address error when profile is first accessed
        let profileInitialized = false;
        
        // Watch for profile page activation
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.target.id === 'profilePage' && 
                    mutation.target.classList.contains('active') && 
                    !profileInitialized) {
                    setTimeout(() => {
                        showProfileErrors();
                        profileInitialized = true;
                    }, 300);
                }
            });
        });

        observer.observe(document.getElementById('profilePage'), {
            attributes: true,
            attributeFilter: ['class']
        });

        // Smooth animations on load
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.login-container').classList.add('fade-in');
        });
    </script>
</body>
</html>