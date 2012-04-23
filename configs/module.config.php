<?php

return array(

    'uniform' => array(
		'uniform' 		=> array('path' => '/css/uni-form/css/', 'theme' => 'blue'),
		'jqueryui'		=> array('path' => '/js/jqueryui/', 'theme' => 'base'),
		'timepicker' 	=> array('path' => '/js/jquery-timepicker/'),
		'tinymce'		=> array('path' => '/js/tinymce/'),
		'jquery'		=> array('path' => '/js/jquery-1.7.1.min.js'),
	),
	
    'di' => array(
        'instance' => array(
            'alias' => array(
                'uniform' => 'ReverseUniForm\Controller\IndexController',
            ),
            'Zend\View\PhpRenderer' => array(
                'parameters' => array(
                    'resolver' => 'Zend\View\TemplatePathStack',
                    'options'  => array(
                        'script_paths' => array(
                            'uniformView' 		=> __DIR__ . '/../views',
                        ),
                    ),
                ),
            ),
			'Zend\Mvc\Router\RouteStack' => array(
                'parameters' => array(
                    'routes' => array(
                        'uniform' => array(
                            'type'    => 'Zend\Mvc\Router\Http\Literal',
                            'options' => array(
                                'route'    => '/uniform-demo',
                                'defaults' => array(
                                    'controller' => 'uniform',
                                    'action'     => 'index',
								),
							),
						),
					),
				),
			),
        ),
    ),
    
);