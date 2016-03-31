<?php
    return array(
        'controllers' => array(
            'invokables' => array(
                'Blog\Controller\Index' => 'Blog\Controller\IndexController'
            ),
        ),
        'router' => array(
            'routes' => array(
                'blog' => array(
                    'type' => 'segment',
                    'options' => array(
                        'route'    => '/[:action/][:id/]',
                        'constraints' => array(
                            'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            'id'         => '[0-9]+',
                        ),
                        'defaults' => array(
                            'controller' => 'Blog\Controller\Index',
                            'action'     => 'index',
                        ),
                    ),
                ),
            ),
        ),
        'view_manager' => array(
            'template_path_stack' => array(
                __DIR__ . '/../view',
            )
        )
    );