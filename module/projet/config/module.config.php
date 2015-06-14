<?php
return array(
	'controllers' => array(
		'invokables' => array('projet/Controller/projet' => 'projet\Controller\projetController'),
	),
	'router' => array(
		'routes' =>array(
			'Pizza' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'projet\Controller\projet',
                        'action'     => 'index',
                    ),
                ),
            ),
			'Projet'=> array(
				'type'=>'segment',
				'options'=> array(
					'route' => '/projet[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'	=> '[0-9]+',),
					'defaults' =>array(
						'controller'=>'projet/Controller/projet',
						'action'=>'index',
						),
					),
				),
			),
	),
	'view_manager' => array('template_path_stack' => array('projet' => __DIR__.'/../view',),),
	
);