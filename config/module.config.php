<?php

namespace ZF2EntityAudit;

return array(
    'router' => array(
        'routes' => array(
            'audit' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/audit',
                    'defaults' => array(
                        '__NAMESPACE__' => 'zf2entityaudit\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(

                    'index' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/:page]',
                            'defaults' => array(
                                'page' => "1"
                            ),
                        ),
                    ),
                    'log' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/log[/:page]',
                            'constraints' => array(
                                'page' => '[0-9]*',
                            ),
                            'defaults' => array(
                                'page' => '1'
                            )
                        )
                    ),
                    'viewrevision' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/revision[/:rev]',
                            'constraints' => array(
                                'rev' => '[0-9]*',
                            ),
                            'defaults' => array(
                                'action' => 'viewrevision',
                                'rev' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            )
                        )
                    ),
                    'viewentity' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/entity[/:id[/:className]]',
                            'constraints' => array(
                                'id' => '[0-9]*',
                            ),
                            'defaults' => array(
                                'action' => 'viewentity',
                                'id' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'className' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            )
                        )
                    ),
                    'viewdetails' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/details[/:id[/:className[/:rev]]]',
                            'constraints' => array(
                                'id' => '[0-9]*',
                                'rev' => '[0-9]*',
                            ),
                            'defaults' => array(
                                'action' => 'viewdetail',
                                'id' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'className' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'rev' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            )
                        )
                    ),
                    'compare' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/compare[/:className[/:id]]',
                            'constraints' => array(
                                'id' => '[0-9]*',
                            ),
                            'defaults' => array(
                                'action' => 'compare',
                                'id' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'className' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                        )
                    ),
                )
            )
        ),
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'update-datebase' => array(
                    'options' => array(
                        'route' => 'update',
                        'defaults' => array(
                            'controller' => 'ZF2EntityAudit\Controller\Console',
                            'action' => 'update'
                        )
                    )
                )
            )
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'ZF2EntityAudit\Controller\Index' => 'ZF2EntityAudit\Controller\IndexController',
            'ZF2EntityAudit\Controller\Console' => 'ZF2EntityAudit\Controller\ConsoleController'
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'paginator/control.phtml' => __DIR__ . '/../view/zf2-entity-audit/paginator/controls.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
