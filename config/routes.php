<?php
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

// NEW WAY (CakePHP 4.x/5.x) - CORRECT!
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    // Register scoped middleware for CSRF protection
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true,
    ]));

    // Apply middleware
    $routes->applyMiddleware('csrf');

    // HOME PAGE
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    
    // ============================================
    // PERSON A: ARLIA - AUTHENTICATION ROUTES
    // ============================================
    $routes->connect('/login', ['controller' => 'Auth', 'action' => 'login']);
    $routes->connect('/register', ['controller' => 'Auth', 'action' => 'register']);
    $routes->connect('/logout', ['controller' => 'Auth', 'action' => 'logout']);
    $routes->connect('/profile', ['controller' => 'Auth', 'action' => 'profile']);
    $routes->connect('/students', ['controller' => 'Auth', 'action' => 'students']);
    $routes->connect('/lecturers', ['controller' => 'Auth', 'action' => 'lecturers']);
    $routes->connect('/admins', ['controller' => 'Auth', 'action' => 'admins']);
    
    // ============================================
    // PERSON B: LISA - ACADEMIC ROUTES
    // ============================================
    $routes->connect('/faculties', ['controller' => 'Academic', 'action' => 'index']);
    $routes->connect('/faculties/view/*', ['controller' => 'Academic', 'action' => 'view']);
    $routes->connect('/programmes', ['controller' => 'Academic', 'action' => 'programmes']);
    $routes->connect('/programmes/view/*', ['controller' => 'Academic', 'action' => 'viewProgramme']);
    
    // ============================================
    // PERSON C: KHAI - APPOINTMENT ROUTES
    // ============================================
    $routes->connect('/book', ['controller' => 'Appointments', 'action' => 'book']);
    $routes->connect('/availability', ['controller' => 'Appointments', 'action' => 'availability']);
    $routes->connect('/appointments', ['controller' => 'Appointments', 'action' => 'index']);
    $routes->connect('/appointments/view/*', ['controller' => 'Appointments', 'action' => 'view']);
    $routes->connect('/appointments/approve/*', ['controller' => 'Appointments', 'action' => 'approve']);
    $routes->connect('/appointments/cancel/*', ['controller' => 'Appointments', 'action' => 'cancel']);
    
    // ============================================
    // PERSON D: AUFA - NOTIFICATION ROUTES
    // ============================================
    $routes->connect('/notifications', ['controller' => 'Notifications', 'action' => 'index']);
    $routes->connect('/notifications/view/*', ['controller' => 'Notifications', 'action' => 'view']);
    $routes->connect('/notifications/settings', ['controller' => 'Notifications', 'action' => 'settings']);
    $routes->connect('/notifications/mark-read/*', ['controller' => 'Notifications', 'action' => 'markRead']);
    
    // ============================================
    // DASHBOARD ROUTES
    // ============================================
    $routes->connect('/dashboard/student', ['controller' => 'Dashboard', 'action' => 'student']);
    $routes->connect('/dashboard/lecturer', ['controller' => 'Dashboard', 'action' => 'lecturer']);
    $routes->connect('/dashboard/admin', ['controller' => 'Dashboard', 'action' => 'admin']);
    
    // Enable default routes
    $routes->fallbacks(DashedRoute::class);
});