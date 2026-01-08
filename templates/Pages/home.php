<?php
/**
 * @var \App\View\AppView $this
 * @var string $message
 */
$this->assign('title', 'Lecturer Appointment Booking System');
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
    html {
    font-size: 80%;  
    }
    :root {
        --primary: #2A64F6;
        --secondary: #00C4B3;
        --accent: #FF6B6B;
        --light: #f8f9fa;
        --dark: #212529;
        --gray: #6c757d;
    }
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: 'Poppins', sans-serif;
        line-height: 1.7;
        color: var(--dark);
        background-color: white;
        width: 100%;
        overflow-x: hidden;
    }

    /* COMPLETELY REMOVE ALL CONTAINER CONSTRAINTS */
    .container,
    .container-fluid,
    .content-wrapper {
        width: 100%;
        max-width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    /* Full width content inside sections */
    .section-content {
        width: 100%;
        max-width: 1360px;
        margin: 0 auto;
        padding: 0 20px;
    }

    @media (min-width: 768px) {
        .section-content {
            padding: 0 30px;
        }
    }

    @media (min-width: 992px) {
        .section-content {
            padding: 0 40px;
        }
    }

    @media (min-width: 1200px) {
        .section-content {
            padding: 0 50px;
        }
    }

    /* Navbar - FULL WIDTH */
    .navbar {
        background: white;
        padding: 1.5rem 0;
        transition: all 0.3s ease;
        width: 100%;
        border-bottom: 1px solid #f0f0f0;
    }

    .navbar-inner {
        width: 100%;
        max-width: 1360px;
        margin: 0 auto;
        padding: 0 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    @media (min-width: 768px) {
        .navbar-inner {
            padding: 0 30px;
        }
    }

    @media (min-width: 992px) {
        .navbar-inner {
            padding: 0 40px;
        }
    }

    .navbar.scrolled {
        padding: 1rem 0;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .navbar-brand {
        font-weight: 700;
        font-size: 1.8rem;
        color: var(--primary) !important;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .navbar-brand:hover {
        transform: translateY(-2px);
    }

    .navbar-brand i {
        color: var(--primary);
        margin-right: 8px;
        transition: transform 0.3s ease;
    }

    .navbar-brand:hover i {
        transform: rotate(-10deg);
    }

    .nav-link {
        font-weight: 500;
        margin: 0 15px;
        color: var(--dark) !important;
        transition: all 0.3s ease;
        position: relative;
        text-decoration: none;
    }

    .nav-link:hover {
        color: var(--primary) !important;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--primary);
        transition: width 0.3s ease;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .btn-nav {
        background: var(--primary);
        border: none;
        color: white;
        padding: 10px 28px;
        border-radius: 4px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-nav:hover {
        background: #1a53f5;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(42, 100, 246, 0.2);
    }

    /* Hero - FULL WIDTH */
    .hero {
        background: white;
        width: 100%;
        padding: 200px 0 140px;
        margin-top: -130px;   /* centers perfectly */
        margin-bottom: -80px;
        margin-left: 60px;
    }

    .hero h1 {
        font-size: 3.5rem;
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 1.5rem;
        color: var(--dark);
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease forwards;
    }

    .hero p.lead {
        font-size: 1.3rem;
        color: var(--gray);
        max-width: 600px;
        margin-bottom: 2.5rem;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease 0.2s forwards;
    }

    .hero-buttons {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease 0.4s forwards;
    }

.hero img {
    background: transparent !important;
    opacity: 0;
    transform: translateX(30px);
    animation: fadeInRight 0.8s ease 0.6s forwards;
    transition: transform 0.5s ease;
    max-width: 100%;
    height: auto;
    object-fit: contain;        
    display: block;
    background-color: transparent !important;
    padding: 0 !important;
}

/* Extra safety for parent */
.col-lg-6 {
    background: transparent !important;
}
    .hero img:hover {
        transform: scale(1.02);
    }

    .btn-primary-custom {
        background: var(--primary);
        border: none;
        color: white;
        padding: 14px 35px;
        border-radius: 4px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        margin-right: 15px;
        margin-bottom: 10px;
    }

    .btn-primary-custom:hover {
        background: #1a53f5;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(42, 100, 246, 0.2);
    }

    .btn-outline-custom {
        background: transparent;
        border: 1px solid var(--primary);
        color: var(--primary);
        padding: 14px 35px;
        border-radius: 4px;
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
        box-shadow: 0 8px 20px rgba(42, 100, 246, 0.1);
    }

    /* Sections - ALL FULL WIDTH */
    .features,
    .roles,
    .how-it-works,
    .stats,
    .cta-section {
        padding: 120px 0;
        width: 100%;
    }

    .section-title {
        text-align: center;
        margin-bottom: 4rem;
    }

    .section-title h2 {
        font-size: 2.5rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--dark);
        opacity: 0;
        transform: translateY(20px);
    }

    .section-title p {
        font-size: 1.1rem;
        color: var(--gray);
        max-width: 600px;
        margin: 0 auto;
        opacity: 0;
        transform: translateY(20px);
    }

    .section-title.animate h2,
    .section-title.animate p {
        opacity: 1;
        transform: translateY(0);
        transition: all 0.6s ease;
    }

    /* Features */
    .features {
        background: white;
    }

    .feature-item {
        text-align: center;
        margin-bottom: 3rem;
        padding: 40px 30px;
        transition: all 0.3s ease;
        opacity: 0;
        transform: translateY(30px);
    }

    .feature-item.animate {
        opacity: 1;
        transform: translateY(0);
    }

    .feature-item:hover {
        transform: translateY(-10px);
    }

    .feature-icon {
        font-size: 2.8rem;
        color: var(--primary);
        margin-bottom: 1.5rem;
        display: inline-block;
        transition: all 0.3s ease;
    }

    .feature-item:hover .feature-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .feature-item h3 {
        font-size: 1.4rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--dark);
    }

    .feature-item p {
        color: var(--gray);
        font-size: 1rem;
        line-height: 1.6;
    }

    /* Role Cards */
    .roles {
        background: #f8f9fa;
        width: 100vw;
        margin-left: calc(50% - 50vw);     /* centers perfectly */
        margin-right: calc(50% - 50vw);    /* symmetric */
        position: relative;
    }

    .role-item {
        background: white;
        padding: 40px 30px;
        height: 100%;
        text-align: center;
        border: 1px solid #f0f0f0;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        opacity: 0;
        transform: translateY(40px) scale(0.95);
    }

    .role-item.animate {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    .role-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.08);
        border-color: var(--primary);
    }

    .role-icon {
        font-size: 3rem;
        color: white;
        margin-bottom: 1.5rem;
        display: inline-block;
        width: 90px;
        height: 90px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .role-item:hover .role-icon {
        transform: scale(1.1);
    }

    .role-student .role-icon {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .role-lecturer .role-icon {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .role-everyone .role-icon {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .role-item h3 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        color: var(--dark);
    }

    .role-item ul {
        list-style: none;
        padding: 0;
        margin: 0;
        text-align: left;
    }

    .role-item li {
        padding: 10px 0;
        color: var(--gray);
        position: relative;
        padding-left: 30px;
        transition: all 0.3s ease;
        border-bottom: 1px solid #f0f0f0;
    }

    .role-item li:last-child {
        border-bottom: none;
    }

    .role-item li:hover {
        color: var(--primary);
        padding-left: 35px;
    }

    .role-item li:before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--primary);
        font-weight: bold;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .role-item li:hover:before {
        transform: scale(1.2);
    }

    /* How It Works */
    .how-it-works {
        background: white;
    }

    .step-item {
        text-align: center;
        padding: 40px 30px;
        transition: all 0.3s ease;
        opacity: 0;
        transform: translateY(30px);
    }

    .step-item.animate {
        opacity: 1;
        transform: translateY(0);
    }

    .step-item:hover {
        transform: translateY(-10px);
    }

    .step-number {
        width: 70px;
        height: 70px;
        background: var(--primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        color: white;
        font-size: 1.8rem;
        font-weight: 600;
        transition: all 0.5s ease;
    }

    .step-item:hover .step-number {
        transform: rotate(360deg) scale(1.1);
    }

    .step-item h3 {
        font-size: 1.4rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--dark);
    }

    .step-item p {
        color: var(--gray);
        font-size: 1rem;
        line-height: 1.6;
    }

    /* Stats - FULL WIDTH */
    .stats {
        background: var(--primary);
        color: white;
        position: relative;
        overflow: hidden;
        /* Break out of parent container */
        width: 100vw;
        margin-left: calc(50% - 50vw);   /* centers it perfectly */
        margin-right: calc(50% - 50vw);
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
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: white;
        text-shadow: 0 2px 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .stat-item:hover .stat-number {
        transform: scale(1.1);
    }

    .stat-label {
        font-size: 1.1rem;
        opacity: 0.9;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
    }

    .stat-item:hover .stat-label {
        opacity: 1;
        letter-spacing: 2px;
    }

    /* CTA */
    .cta-section {
        background: white;
    }

    .cta-content {
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
        opacity: 0;
        transform: scale(0.9);
    }

    .cta-content.animate {
        opacity: 1;
        transform: scale(1);
        transition: all 0.6s ease;
    }

    .cta-content h2 {
        font-size: 2.5rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        color: var(--dark);
    }

    .cta-content p {
        font-size: 1.2rem;
        color: var(--gray);
        margin-bottom: 2.5rem;
    }

    footer {
        background: var(--dark);
        color: white;
        padding: 80px 0 40px;
        width: 100vw;
        margin-left: calc(50% - 50vw);
        margin-right: calc(50% - 50vw);
        margin-bottom: calc(50% - 50vw);
        position: relative;
}

    .footer-inner {
        width: 100%;
        max-width: 1360px;
        margin: 0 auto;
        padding: 0 20px;
    }

    @media (min-width: 768px) {
        .footer-inner {
            padding: 0 30px;
        }
    }

    @media (min-width: 992px) {
        .footer-inner {
            padding: 0 40px;
        }
    }

    .footer h5 {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        color: white;
    }

    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 10px;
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
    }

    .footer-links a:hover {
        color: white;
        transform: translateX(5px);
    }

    .copyright {
        text-align: center;
        padding-top: 40px;
        margin-top: 40px;
        border-top: 1px solid #495057;
        color: #adb5bd;
        font-size: 0.9rem;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.5s ease;
    }

    .copyright.animate {
        opacity: 1;
        transform: translateY(0);
    }

    /* Custom Grid System without Bootstrap constraints */
    .custom-row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -15px;
    }

    .custom-col {
        padding: 0 15px;
        flex: 1 0 100%;
        max-width: 100%;
    }

    @media (min-width: 768px) {
        .custom-col {
            flex: 1 0 50%;
            max-width: 50%;
        }
    }

    @media (min-width: 992px) {
        .custom-col {
            flex: 1 0 33.333%;
            max-width: 33.333%;
        }
    }

    /* Animation Keyframes */
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

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .hero h1 {
            font-size: 3rem;
        }
        
        .section-title h2 {
            font-size: 2.2rem;
        }
    }

    @media (max-width: 992px) {
        .hero {
            padding: 160px 0 100px;
            text-align: center;
        }
        
        .hero h1 {
            font-size: 2.5rem;
        }
        
        .hero p.lead {
            font-size: 1.2rem;
        }
        
        .section-title h2 {
            font-size: 2rem;
        }
        
        .features,
        .roles,
        .how-it-works,
        .stats,
        .cta-section {
            padding: 100px 0;
        }

        .navbar-collapse {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-top: 10px;
        }
    }

    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2rem;
        }
        
        .hero p.lead {
            font-size: 1.1rem;
        }
        
        .section-title h2 {
            font-size: 1.8rem;
        }
        
        .btn-primary-custom, .btn-outline-custom {
            display: block;
            width: 100%;
            margin-right: 0;
            margin-bottom: 15px;
        }
        
        .feature-item,
        .role-item,
        .step-item {
            margin-bottom: 2rem;
        }

        .section-content {
            padding: 0 15px !important;
        }

        .navbar-inner,
        .footer-inner {
            padding: 0 15px !important;
        }
    }

    @media (max-width: 576px) {
        .hero {
            padding: 140px 0 60px;
        }
        
        .features,
        .roles,
        .how-it-works,
        .stats,
        .cta-section {
            padding: 80px 0;
        }
    }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="navbar-inner">
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
        <div class="section-content">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Lecturer Booking Appointment</h1>
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
                <img src="webroot/img/imgappoint.png"
                         alt="Appointment Illustration" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="section-content">
            <div class="section-title">
                <h2>Powerful Booking Features</h2>
                <p>Everything you need for efficient lecturer appointment management</p>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h3>Smart Scheduling</h3>
                        <p>Students can book appointments with lecturers based on real-time availability. No more double bookings.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3>Time Management</h3>
                        <p>Lecturers can set office hours, block unavailable times, and manage their schedule efficiently.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <h3>Smart Notifications</h3>
                        <p>Automated reminders for both students and lecturers. Never miss an appointment again.</p>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h3>Analytics Dashboard</h3>
                        <p>Track appointment statistics, lecturer utilization, and student engagement metrics.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3>Mobile Friendly</h3>
                        <p>Access the system from any device. Book appointments on the go with our responsive design.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-item">
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
        <div class="section-content">
            <div class="section-title">
                <h2>Designed For Everyone</h2>
                <p>Tailored interfaces for different user roles</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="role-item role-student">
                        <div class="role-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <h3>Students</h3>
                        <ul>
                            <li>View lecturer availability</li>
                            <li>Book appointments online</li>
                            <li>Receive notifications</li>
                            <li>Track appointment history</li>
                            <li>Cancel or reschedule</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="role-item role-lecturer">
                        <div class="role-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <h3>Lecturers</h3>
                        <ul>
                            <li>Set available time slots</li>
                            <li>Approve/reject requests</li>
                            <li>View appointment calendar</li>
                            <li>Block unavailable times</li>
                            <li>Track meeting history</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="role-item role-everyone">
                        <div class="role-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Everyone</h3>
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
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works" id="how-it-works">
        <div class="section-content">
            <div class="section-title">
                <h2>How It Works</h2>
                <p>Simple three-step process for booking appointments</p>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="step-item">
                        <div class="step-number">1</div>
                        <h3>Browse Lecturers</h3>
                        <p>Students browse available lecturers and view their schedules, specialties, and office hours.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="step-item">
                        <div class="step-number">2</div>
                        <h3>Book Appointment</h3>
                        <p>Select a convenient time slot, specify the purpose, and book the appointment with one click.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="step-item">
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
        <div class="section-content">
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
        <div class="section-content">
            <div class="cta-content">
                <h2>Ready to Simplify Your Appointment Booking?</h2>
                <p>Join hundreds of students and lecturers who have transformed their academic scheduling experience.</p>
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
    </section>

    <!-- Footer - FULL WIDTH -->
    <footer class="footer">
        <div class="footer-inner">
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
        document.addEventListener('DOMContentLoaded', function() {
            // Remove zoom
            document.body.style.zoom = "100%";
        });
        
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
        
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
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
        document.querySelectorAll('.section-title, .feature-item, .role-item, .step-item, .stat-item, .cta-content, .copyright').forEach(el => {
            observer.observe(el);
        });
        
        // Observe footer sections
        document.querySelectorAll('.footer-links').forEach(el => {
            observer.observe(el);
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