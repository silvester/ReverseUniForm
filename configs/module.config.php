<?php
return array(
    'uniform' => array(
		'uniform' 		=> array('path' => '/css/uni-form/css/', 'theme' => 'blue'),
		'jqueryui'		=> array('path' => '/js/jqueryui/', 'theme' => 'Aristo'),
		'timepicker' 	=> array('path' => '/js/jquery-timepicker/'),
		'tinymce'		=> array('path' => '/js/tinymce/'),
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
                            'uniformme' => __DIR__ . '/../views',
                        ),
                    ),
                ),
            ),
			
        ),
    ),
    
    'routes' => array(
        'uniform' => array(
            'type' => 'Zend\Mvc\Router\Http\Literal',
            'options' => array(
                'route'    => '/uniform-demo',
                'defaults' => array(
                    'controller' => 'uniform',
                    'action'     => 'index',
                ),
            ),
        ),
    ),
    
);
