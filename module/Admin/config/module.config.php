<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Admin\Controller\Index' => 'Admin\Controller\IndexController',
            'category' => 'Admin\Controller\CategoryController',
            'article'  => 'Admin\Controller\ArticleController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'admin' => array(
                'type' => 'literal',
                'options' => array(
                    'route'    => '/admin/',
                    'defaults' => array(
                        'controller' => 'Admin\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'category' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => 'category/[:action/][:id/]',
                            'defaults' => array(
                                'controller' => 'category',
                                'action' => 'index'
                            ),
                        ),
                    ),
                    'article' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => 'article/[:action/][:id/]',
                            'defaults' => array(
                                'controller' => 'article',
                                'action' => 'index'
                            ),
                        ),
                    ),
                ),
            ),

        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'template_map' => array(
            'pagination_control' => __DIR__ . '/../view/layout/pagination_control.phtml',
        )
    )
);