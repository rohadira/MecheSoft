<?php
namespace Laboratorio;

use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\LaboratorioController::class => InvokableFactory::class,
        ],
    ],

    'router' => [
        'routes' => [
            'laboratorio' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/laboratorio[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]',
                        'id' => '[0-9]',
                    ],
                    'defaults' => [
                        'controller' => Controller\LaboratorioController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'laboratorio' => __DIR__.'/../view',
            'orden' => __DIR__.'/../view',
        ],
    ],
];
