<?php
declare(strict_types=1);

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {

        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
        $builder->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

        // Academic module (yang kau dah buat)
        $builder->connect('/academic/faculties', ['controller' => 'Academic', 'action' => 'faculties']);
        $builder->connect('/academic/faculty-view/*', ['controller' => 'Academic', 'action' => 'facultyView']);
        $builder->connect('/academic/programmes', ['controller' => 'Academic', 'action' => 'programmes']);
        $builder->connect('/academic/programme-view/*', ['controller' => 'Academic', 'action' => 'programmeView']);

        // Lecturer module
        $builder->connect('/lecturers', ['controller' => 'Lecturers', 'action' => 'index']);
        $builder->connect('/lecturers/view/*', ['controller' => 'Lecturers', 'action' => 'view']);

        // Appointments module (next step)
        $builder->connect('/appointments', ['controller' => 'Appointments', 'action' => 'index']);
        $builder->connect('/appointments/view/*', ['controller' => 'Appointments', 'action' => 'view']);

        $builder->fallbacks();
    });
};
