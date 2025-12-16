<?php
declare(strict_types=1);

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Do not forget to load this file in your config/bootstrap.php.
 *
 * @var \Cake\Routing\RouteBuilder $routes
 */

return function (RouteBuilder $routes): void {
    // Set the default route class
    $routes->setRouteClass(DashedRoute::class);
    
    // Define routes within the root scope
    $routes->scope('/', function (RouteBuilder $builder): void {
        // Home page route
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
        
        // Pages controller routes
        $builder->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
        
        // Connect catch-all routes (should be last)
        $builder->fallbacks();
    });
    
    // Load the DebugKit plugin routes (if you're using it)
    // $routes->loadPlugin('DebugKit');
};