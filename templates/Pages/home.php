<?php
/**
 * @var \App\View\AppView $this
 * @var string $message
 */
$this->assign('title', 'BookIt - Student Appointment Booking System');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?></title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <?= $this->Html->css('home') ?>
    
    <style>
    html, body {
    overflow-x: hidden;
    }

    .stats,
    .footer {
    width: 100%;
    }

        
        :root {
            --primary: #4361ee;
            --secondary: #3a0ca3;
            --accent: #f72585;
            --success: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--dark);
            background-color: var(--light);
        }
        
        /* Header & Navigation */
        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--primary) !important;
        }
        
        .navbar-brand i {
            color: var(--accent);
            margin-right: 8px;
        }
        
        .nav-link {
            font-weight: 500;
            margin: 0 10px;
            color: var(--dark) !important;
        }
        
        .nav-link:hover {
            color: var(--primary) !important;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 120px 0 100px;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }
        
        .hero p.lead {
            font-size: 1.3rem;
            opacity: 0.9;
            margin-bottom: 2.5rem;
            max-width: 600px;
        }
        
        .btn-hero {
            background: var(--accent);
            border: none;
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin-right: 15px;
            margin-bottom: 10px;
        }
        
        .btn-hero:hover {
            background: #e11570;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        
        .btn-hero-outline {
            background: transparent;
            border: 2px solid white;
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-hero-outline:hover {
            background: white;
            color: var(--primary);
        }
        
        .hero-image {
            position: relative;
            z-index: 1;
        }
        
        /* Features Section */
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1rem;
        }
        
        .section-title p {
            color: #666;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .features {
            padding: 100px 0;
            background: white;
        }
        
        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 40px 30px;
            height: 100%;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border: 1px solid #eee;
            text-align: center;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
        }
        
        .feature-icon i {
            font-size: 2rem;
            color: white;
        }
        
        .feature-card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--dark);
        }
        
        .feature-card p {
            color: #666;
            margin-bottom: 0;
        }
        
        /* Role Cards */
        .roles {
            padding: 100px 0;
            background: #f8f9fa;
        }
        
        .role-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .role-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }
        
        .role-header {
            padding: 30px;
            color: white;
            text-align: center;
        }
        
        .role-student .role-header {
            background: linear-gradient(135deg, #4299e1, #3182ce);
        }
        
        .role-lecturer .role-header {
            background: linear-gradient(135deg, #48bb78, #38a169);
        }
        
        .role-admin .role-header {
            background: linear-gradient(135deg, #ed8936, #dd6b20);
        }
        
        .role-icon {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        
        .role-body {
            padding: 30px;
        }
        
        .role-body h4 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--dark);
        }
        
        .role-body ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .role-body li {
            padding: 8px 0;
            color: #666;
            position: relative;
            padding-left: 25px;
        }
        
        .role-body li:before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--primary);
            font-weight: bold;
        }
        
        /* Stats Section */
        .stats {
            padding: 80px 0;
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            color: white;
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: white;
        }
        
        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        /* Footer */
        .footer {
            background: var(--dark);
            color: white;
            padding: 70px 0 30px;
        }
        
        .footer h5 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: white;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .footer-links li {
            margin-bottom: 12px;
        }
        
        .footer-links a {
            color: #adb5bd;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .copyright {
            text-align: center;
            padding-top: 30px;
            margin-top: 50px;
            border-top: 1px solid #495057;
            color: #adb5bd;
            font-size: 0.9rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p.lead {
                font-size: 1.1rem;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
            
            .btn-hero, .btn-hero-outline {
                display: block;
                width: 100%;
                margin-right: 0;
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-calendar-check"></i> BookIt
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#roles">For</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/users/login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1>Streamline Your University Appointments</h1>
                    <p class="lead">BookIt makes scheduling appointments between students and lecturers simple, efficient, and organized.</p>
                    <div class="hero-buttons">
                        <a href="/users/register" class="btn-hero">
                            <i class="fas fa-user-plus me-2"></i>Get Started
                        </a>
                        <a href="#features" class="btn-hero-outline">
                            <i class="fas fa-play-circle me-2"></i>Learn More
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 hero-image">
                    <img src="https://cdn.pixabay.com/photo/2018/09/27/09/22/artificial-intelligence-3706562_1280.jpg" 
                         alt="Calendar Illustration" class="img-fluid" 
                         style="border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.2);">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-title">
                <h2>Powerful Features</h2>
                <p>Everything you need for efficient appointment management</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h3>Easy Scheduling</h3>
                        <p>Students can book appointments with lecturers in just a few clicks. Real-time availability ensures no double bookings.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <h3>Smart Notifications</h3>
                        <p>Receive instant notifications for new appointments, reminders, and status updates via email and in-app alerts.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h3>Analytics Dashboard</h3>
                        <p>Admins get detailed reports on appointment statistics, faculty utilization, and student engagement metrics.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Role Management</h3>
                        <p>Separate interfaces for Students, Lecturers, and Admins with appropriate permissions and workflows.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3>Mobile Friendly</h3>
                        <p>Access the system from any device. Responsive design works perfectly on smartphones, tablets, and desktops.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Secure & Private</h3>
                        <p>Enterprise-grade security with encrypted data, secure authentication, and privacy controls.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Role Cards Section -->
    <section class="roles" id="roles">
        <div class="container">
            <div class="section-title">
                <h2>Designed For Everyone</h2>
                <p>Tailored interfaces for different user roles</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="role-card role-student">
                        <div class="role-header">
                            <div class="role-icon">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <h3>Students</h3>
                        </div>
                        <div class="role-body">
                            <h4>Book Appointments Easily</h4>
                            <ul>
                                <li>View lecturer availability</li>
                                <li>Book appointments online</li>
                                <li>Receive notifications</li>
                                <li>Track appointment history</li>
                                <li>Cancel or reschedule</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="role-card role-lecturer">
                        <div class="role-header">
                            <div class="role-icon">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <h3>Lecturers</h3>
                        </div>
                        <div class="role-body">
                            <h4>Manage Your Schedule</h4>
                            <ul>
                                <li>Set available time slots</li>
                                <li>Approve/reject requests</li>
                                <li>View appointment calendar</li>
                                <li>Block unavailable times</li>
                                <li>Track meeting history</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="role-card role-admin">
                        <div class="role-header">
                            <div class="role-icon">
                                <i class="fas fa-user-cog"></i>
                            </div>
                            <h3>Administrators</h3>
                        </div>
                        <div class="role-body">
                            <h4>Oversee The System</h4>
                            <ul>
                                <li>Manage all users</li>
                                <li>Monitor appointments</li>
                                <li>Generate reports</li>
                                <li>System configuration</li>
                                <li>Troubleshoot issues</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Stats Section -->
<section class="stats">
    <div class="container-fluid p-0">
        <div class="container py-5">
            <div class="row text-center">
                <div class="col-md-3 col-6 stat-item">
                    <div class="stat-number">1,250+</div>
                    <div class="stat-label">Students</div>
                </div>
                <div class="col-md-3 col-6 stat-item">
                    <div class="stat-number">85+</div>
                    <div class="stat-label">Lecturers</div>
                </div>
                <div class="col-md-3 col-6 stat-item">
                    <div class="stat-number">3,400+</div>
                    <div class="stat-label">Appointments</div>
                </div>
                <div class="col-md-3 col-6 stat-item">
                    <div class="stat-number">12+</div>
                    <div class="stat-label">Faculties</div>
                </div>
            </div>
        </div>
    </div>
</section>


 <!-- Footer -->
<footer class="footer" id="about">
    <div class="container-fluid p-0">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5><i class="fas fa-calendar-check me-2"></i>BookIt System</h5>
                    <p class="mt-3 text-muted">
                        A comprehensive university appointment booking system designed
                        to streamline student-lecturer interactions.
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="#features">Features</a></li>
                        <li><a href="#roles">For Users</a></li>
                        <li><a href="/users/login">Login</a></li>
                        <li><a href="/users/register">Register</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Support</h5>
                    <ul class="footer-links">
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Team Members</h5>
                    <ul class="footer-links">
                        <li>Arlia – Authentication</li>
                        <li>Lisa – Academic Structure</li>
                        <li>Khai – Appointments</li>
                        <li>Aufa – Notifications</li>
                    </ul>
                </div>
            </div>

            <div class="copyright">
                <p>&copy; <?= date('Y') ?> BookIt Appointment System. All rights reserved.</p>
                <p class="mt-2">Built with CakePHP 5.2.10</p>
            </div>
        </div>
    </div>
</footer>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 70,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Navbar background on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.boxShadow = '0 2px 10px rgba(0,0,0,0.1)';
            } else {
                navbar.style.boxShadow = '0 2px 10px rgba(0,0,0,0.05)';
            }
        });
        
        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                }
            });
        }, observerOptions);
        
        // Observe feature cards and role cards
        document.querySelectorAll('.feature-card, .role-card').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>