<?php
/**
 * @var \App\View\AppView $this
 * @var string $message
 */
$this->assign('title', 'BookIt - Lecturer Appointment Booking System');
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
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <style>
    :root {
        --primary: #2A64F6;
        --secondary: #00C4B3;
        --accent: #FF6B6B;
        --success: #28a745;
        --light: #f8f9fa;
        --dark: #1a1a2e;
        --gray: #6c757d;
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
        background-color: white;
        width: 100%;
        overflow-x: hidden;
    }
    
    /* Full width container */
    .full-width-container {
        width: 100%;
        max-width: 100%;
        margin: 0;
        padding: 0;
    }
    
    /* Header & Navigation - SimplyBook Style */
    .navbar {
        background: white;
        box-shadow: 0 2px 20px rgba(0,0,0,0.08);
        padding: 1rem 0;
        transition: all 0.3s ease;
        width: 100%;
    }
    
    .navbar .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .navbar-brand {
        font-weight: 700;
        font-size: 1.8rem;
        color: var(--primary) !important;
    }
    
    .navbar-brand i {
        color: var(--secondary);
        margin-right: 8px;
    }
    
    .nav-link {
        font-weight: 500;
        margin: 0 15px;
        color: var(--dark) !important;
        transition: color 0.3s ease;
    }
    
    .nav-link:hover {
        color: var(--primary) !important;
    }
    
    .btn-nav {
        background: var(--primary);
        border: none;
        color: white;
        padding: 10px 25px;
        border-radius: 30px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .btn-nav:hover {
        background: #1a53f5;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(42, 100, 246, 0.3);
    }
    
    /* Hero Section - Full width */
    .hero {
        background: linear-gradient(135deg, #f8faff 0%, #ffffff 100%);
        color: var(--dark);
        padding: 180px 0 120px;
        position: relative;
        overflow: hidden;
        width: 100%;
    }
    
    .hero .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .hero h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        line-height: 1.2;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .hero p.lead {
        font-size: 1.25rem;
        color: var(--gray);
        margin-bottom: 2.5rem;
        max-width: 600px;
    }
    
    .btn-primary-custom {
        background: linear-gradient(135deg, var(--primary), #1a53f5);
        border: none;
        color: white;
        padding: 16px 45px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        margin-right: 15px;
        margin-bottom: 10px;
        box-shadow: 0 5px 15px rgba(42, 100, 246, 0.3);
    }
    
    .btn-primary-custom:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(42, 100, 246, 0.4);
        color: white;
    }
    
    .btn-outline-custom {
        background: transparent;
        border: 2px solid var(--primary);
        color: var(--primary);
        padding: 16px 45px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-outline-custom:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-3px);
    }
    
    /* Features Section */
    .features {
        padding: 120px 0;
        background: white;
        width: 100%;
    }
    
    .features .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .section-title {
        text-align: center;
        margin-bottom: 4rem;
    }
    
    .section-title h2 {
        font-size: 2.8rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 1rem;
    }
    
    .section-title p {
        color: var(--gray);
        font-size: 1.2rem;
        max-width: 700px;
        margin: 0 auto;
    }
    
    .feature-card {
        background: white;
        border-radius: 15px;
        padding: 45px 35px;
        height: 100%;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border: 1px solid #f0f0f0;
        text-align: center;
        opacity: 0;
        transform: translateY(30px);
    }
    
    .feature-card.animate {
        opacity: 1;
        transform: translateY(0);
    }
    
    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        border-color: var(--primary);
    }
    
    .feature-icon {
        width: 90px;
        height: 90px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 30px;
        transform: rotate(45deg);
        transition: all 0.3s ease;
    }
    
    .feature-card:hover .feature-icon {
        transform: rotate(0deg) scale(1.1);
    }
    
    .feature-icon i {
        font-size: 2.2rem;
        color: white;
        transform: rotate(-45deg);
        transition: all 0.3s ease;
    }
    
    .feature-card:hover .feature-icon i {
        transform: rotate(0deg);
    }
    
    .feature-card h3 {
        font-size: 1.6rem;
        font-weight: 600;
        margin-bottom: 15px;
        color: var(--dark);
    }
    
    /* Role Cards Section */
    .roles {
        padding: 120px 0;
        background: #f8faff;
        width: 100%;
    }
    
    .roles .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .role-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        height: 100%;
        opacity: 0;
        transform: translateY(40px) scale(0.95);
    }
    
    .role-card.animate {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
    
    .role-card:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: 0 25px 50px rgba(0,0,0,0.15);
    }
    
    .role-header {
        padding: 45px 35px;
        color: white;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .role-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(255,255,255,0.1), rgba(255,255,255,0));
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .role-card:hover .role-header::before {
        opacity: 1;
    }
    
    .role-student .role-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .role-lecturer .role-header {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }
    
    .role-everyone .role-header {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }
    
    .role-icon {
        font-size: 4rem;
        margin-bottom: 25px;
        display: inline-block;
        transition: all 0.5s ease;
        transform: translateY(0);
    }
    
    .role-card:hover .role-icon {
        transform: translateY(-10px) scale(1.1);
    }
    
    .role-header h3 {
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
        transition: all 0.3s ease;
    }
    
    .role-card:hover .role-header h3 {
        transform: scale(1.05);
    }
    
    .role-body {
        padding: 45px 35px;
        position: relative;
    }
    
    .role-body h4 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 25px;
        color: var(--dark);
        position: relative;
        display: inline-block;
    }
    
    .role-body h4::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 50px;
        height: 3px;
        background: var(--primary);
        transition: width 0.3s ease;
    }
    
    .role-card:hover .role-body h4::after {
        width: 100%;
    }
    
    .role-body ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .role-body li {
        padding: 14px 0;
        color: var(--gray);
        position: relative;
        padding-left: 35px;
        transition: all 0.3s ease;
        border-bottom: 1px solid #f0f0f0;
        font-size: 1.1rem;
    }
    
    .role-body li:last-child {
        border-bottom: none;
    }
    
    .role-body li:hover {
        color: var(--primary);
        padding-left: 40px;
    }
    
    .role-body li:before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--primary);
        font-weight: bold;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }
    
    .role-body li:hover:before {
        transform: scale(1.2);
    }
    
    /* How It Works Section */
    .how-it-works {
        padding: 120px 0;
        background: white;
        width: 100%;
    }
    
    .how-it-works .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .step-card {
        background: white;
        border-radius: 15px;
        padding: 45px 35px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        height: 100%;
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.3s ease;
    }
    
    .step-card.animate {
        opacity: 1;
        transform: translateY(0);
    }
    
    .step-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.12);
    }
    
    .step-number {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 30px;
        color: white;
        font-size: 2rem;
        font-weight: 700;
        transition: all 0.5s ease;
    }
    
    .step-card:hover .step-number {
        transform: rotate(360deg) scale(1.1);
    }
    
    /* Stats Section - Full width background */
    .stats {
        padding: 100px 0;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        position: relative;
        overflow: hidden;
        width: 100%;
    }
    
    .stats .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .stats::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat;
        background-size: cover;
    }
    
    .stat-item {
        text-align: center;
        opacity: 0;
        transform: translateY(20px);
    }
    
    .stat-item.animate {
        opacity: 1;
        transform: translateY(0);
    }
    
    .stat-number {
        font-size: 3.8rem;
        font-weight: 800;
        margin-bottom: 15px;
        color: white;
        text-shadow: 0 2px 10px rgba(0,0,0,0.1);
        position: relative;
        display: inline-block;
        transition: all 0.3s ease;
    }
    
    .stat-item:hover .stat-number {
        transform: scale(1.1);
    }
    
    .stat-label {
        font-size: 1.2rem;
        opacity: 0.9;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
    }
    
    .stat-item:hover .stat-label {
        opacity: 1;
        letter-spacing: 2px;
    }
    
    /* CTA Section */
    .cta-section {
        padding: 120px 0;
        background: linear-gradient(135deg, #f8faff 0%, #ffffff 100%);
        width: 100%;
    }
    
    .cta-section .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .cta-card {
        background: white;
        border-radius: 20px;
        padding: 70px 60px;
        box-shadow: 0 25px 50px rgba(0,0,0,0.1);
        text-align: center;
        position: relative;
        overflow: hidden;
        opacity: 0;
        transform: scale(0.9);
        transition: all 0.6s ease;
    }
    
    .cta-card.animate {
        opacity: 1;
        transform: scale(1);
    }
    
    .cta-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.7s ease;
    }
    
    .cta-card:hover::before {
        left: 100%;
    }
    
    /* Footer - Full width */
    .footer {
        background: var(--dark);
        color: white;
        padding: 80px 0 40px;
        width: 100%;
    }
    
    .footer .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .footer h5 {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 30px;
        color: white;
    }
    
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .footer-links li {
        margin-bottom: 15px;
        opacity: 0;
        transform: translateX(-20px);
        transition: all 0.3s ease;
    }
    
    .footer-links li.animate {
        opacity: 1;
        transform: translateX(0);
    }
    
    .footer-links a {
        color: #adb5bd;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
        font-size: 1.05rem;
    }
    
    .footer-links a:hover {
        color: white;
        transform: translateX(5px);
    }
    
    .copyright {
        text-align: center;
        padding-top: 40px;
        margin-top: 60px;
        border-top: 1px solid #495057;
        color: #adb5bd;
        font-size: 1rem;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.5s ease;
    }
    
    .copyright.animate {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Responsive */
    @media (max-width: 1200px) {
        .hero h1 {
            font-size: 3.2rem;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
        }
    }
    
    @media (max-width: 992px) {
        .hero h1 {
            font-size: 2.8rem;
        }
        
        .hero p.lead {
            font-size: 1.2rem;
        }
        
        .section-title h2 {
            font-size: 2.3rem;
        }
        
        .btn-outline-custom {
            margin-left: 0;
            margin-top: 15px;
        }
    }
    
    @media (max-width: 768px) {
        .hero {
            padding: 150px 0 80px;
            text-align: center;
        }
        
        .hero h1 {
            font-size: 2.3rem;
        }
        
        .hero p.lead {
            font-size: 1.1rem;
        }
        
        .section-title h2 {
            font-size: 2rem;
        }
        
        .section-title p {
            font-size: 1.1rem;
        }
        
        .btn-primary-custom, .btn-outline-custom {
            display: block;
            width: 100%;
            margin-right: 0;
            margin-bottom: 15px;
        }
        
        .cta-card {
            padding: 50px 30px;
        }
        
        .role-card {
            margin-bottom: 30px;
        }
        
        .feature-card, .role-body, .step-card {
            padding: 35px 25px;
        }
        
        .role-header {
            padding: 35px 25px;
        }
    }
    
    @media (max-width: 576px) {
        .hero h1 {
            font-size: 2rem;
        }
        
        .section-title h2 {
            font-size: 1.8rem;
        }
        
        .stat-number {
            font-size: 2.8rem;
        }
        
        .stat-label {
            font-size: 1rem;
        }
    }
    </style>
</head>
<body class="full-width-container">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-calendar-alt"></i> BookIt
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#roles">For Everyone</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#how-it-works">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#stats">Stats</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/users/login">Login</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="/users/register" class="btn btn-nav">
                            Get Started Free
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Streamline Lecturer Appointments</h1>
                    <p class="lead">The modern booking system that makes scheduling appointments between students and lecturers simple, efficient, and hassle-free.</p>
                    <div class="hero-buttons">
                        <a href="/users/register" class="btn-primary-custom">
                            <i class="fas fa-rocket me-2"></i>Start Booking Now
                        </a>
                        <a href="#features" class="btn-outline-custom">
                            <i class="fas fa-play-circle me-2"></i>See Features
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                         alt="Calendar Dashboard" class="img-fluid" 
                         style="border-radius: 20px; box-shadow: 0 25px 50px rgba(0,0,0,0.1);">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-title">
                <h2>Powerful Booking Features</h2>
                <p>Everything you need for efficient lecturer appointment management</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h3>Smart Scheduling</h3>
                        <p>Students can book appointments with lecturers based on real-time availability. No more double bookings.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3>Time Management</h3>
                        <p>Lecturers can set office hours, block unavailable times, and manage their schedule efficiently.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <h3>Smart Notifications</h3>
                        <p>Automated reminders for both students and lecturers. Never miss an appointment again.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h3>Analytics Dashboard</h3>
                        <p>Track appointment statistics, lecturer utilization, and student engagement metrics.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3>Mobile Friendly</h3>
                        <p>Access the system from any device. Book appointments on the go with our responsive design.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Secure & Private</h3>
                        <p>Enterprise-grade security with encrypted data and secure authentication protocols.</p>
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
                    <div class="role-card role-everyone">
                        <div class="role-header">
                            <div class="role-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <h3>Everyone</h3>
                        </div>
                        <div class="role-body">
                            <h4>Unified Platform</h4>
                            <ul>
                                <li>Easy registration process</li>
                                <li>User-friendly dashboard</li>
                                <li>Real-time updates</li>
                                <li>Cross-platform access</li>
                                <li>24/7 system availability</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works" id="how-it-works">
        <div class="container">
            <div class="section-title">
                <h2>How It Works</h2>
                <p>Simple three-step process for booking appointments</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="step-card">
                        <div class="step-number">1</div>
                        <h3>Browse Lecturers</h3>
                        <p>Students browse available lecturers and view their schedules, specialties, and office hours.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="step-card">
                        <div class="step-number">2</div>
                        <h3>Book Appointment</h3>
                        <p>Select a convenient time slot, specify the purpose, and book the appointment with one click.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="step-card">
                        <div class="step-number">3</div>
                        <h3>Meet & Connect</h3>
                        <p>Attend the scheduled meeting and get the academic guidance you need from your lecturer.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats" id="stats">
        <div class="container">
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
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Satisfaction Rate</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="cta-card">
                        <h2 class="mb-4">Ready to Simplify Your Appointment Booking?</h2>
                        <p class="mb-4">Join hundreds of students and lecturers who have transformed their academic scheduling experience.</p>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <a href="/users/register" class="btn-primary-custom w-100">
                                            <i class="fas fa-user-graduate me-2"></i>Student Sign Up
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="/users/register" class="btn-outline-custom w-100">
                                            <i class="fas fa-chalkboard-teacher me-2"></i>Lecturer Sign Up
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <h5><i class="fas fa-calendar-alt me-2"></i>BookIt System</h5>
                    <p class="mt-3" style="color: #adb5bd; max-width: 350px;">
                        A modern lecturer appointment booking system designed to streamline student-lecturer interactions in academic institutions.
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 mb-5">
                    <h5>Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="#features">Features</a></li>
                        <li><a href="#roles">For Everyone</a></li>
                        <li><a href="#how-it-works">How It Works</a></li>
                        <li><a href="/users/login">Login</a></li>
                        <li><a href="/users/register">Register</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-5">
                    <h5>Support</h5>
                    <ul class="footer-links">
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">Contact Support</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-5">
                    <h5>Development Team</h5>
                    <ul class="footer-links">
                        <li>Arlia – Authentication</li>
                        <li>Lisa – Academic Structure</li>
                        <li>Khai – Appointments</li>
                        <li>Aufa – Notifications</li>
                    </ul>
                </div>
            </div>

            <div class="copyright">
                <p>&copy; <?= date('Y') ?> BookIt Lecturer Appointment System. All rights reserved.</p>
                <p class="mt-2">Built with CakePHP 5.2.10</p>
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
                navbar.style.boxShadow = '0 2px 20px rgba(0,0,0,0.08)';
                navbar.style.padding = '0.5rem 0';
            } else {
                navbar.style.boxShadow = '0 2px 20px rgba(0,0,0,0.05)';
                navbar.style.padding = '1rem 0';
            }
        });
        
        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                    
                    // For list items in footer, add staggered animation
                    if (entry.target.classList.contains('footer-links')) {
                        const listItems = entry.target.querySelectorAll('li');
                        listItems.forEach((item, index) => {
                            setTimeout(() => {
                                item.classList.add('animate');
                            }, index * 100);
                        });
                    }
                }
            });
        }, observerOptions);
        
        // Observe all animated elements
        document.querySelectorAll('.feature-card, .role-card, .step-card, .stat-item, .cta-card, .copyright').forEach(el => {
            observer.observe(el);
        });
        
        // Observe footer sections
        document.querySelectorAll('.footer-links').forEach(el => {
            observer.observe(el);
        });
        
        // Add hover effects for role cards
        document.querySelectorAll('.role-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.zIndex = '10';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.zIndex = '1';
            });
        });
        
        // Counter animation for stats
        function animateStats() {
            const stats = document.querySelectorAll('.stat-number');
            
            stats.forEach(stat => {
                const target = parseInt(stat.textContent.replace(/[+,]/g, ''));
                const isPercentage = stat.textContent.includes('%');
                let current = 0;
                const increment = target / 50;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    if (isPercentage) {
                        stat.textContent = Math.floor(current) + '%';
                    } else {
                        stat.textContent = Math.floor(current).toLocaleString() + '+';
                    }
                }, 30);
            });
        }
        
        // Trigger stats animation when stats section is visible
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateStats();
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        const statsSection = document.querySelector('.stats');
        if (statsSection) {
            statsObserver.observe(statsSection);
        }
    </script>
</body>
</html>