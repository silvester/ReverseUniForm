<?php

/**
 * @namespace
 */

namespace ReverseUniForm;

use Zend\Form\Form;
use Zend\Form\Decorator\Fieldset;


class UniForm extends Form
{

	public static $_config;
	
	public function init()
	{

		$this->getView()->headLink()->appendStylesheet(self::$_config['uniform']['path'] . 'uni-form.css')
									->appendStylesheet(self::$_config['uniform']['path'] . self::$_config['uniform']['theme'] .'.uni-form.css');

		$this->setAttrib('class', 'uniForm');
		
		$this->getView()->resolver()->addPath(realpath(__DIR__ . "/Script"));

		$this->addPrefixPath('ReverseUniForm\Decorator', 'ReverseUniForm/Decorator', 'decorator');
		
		//$this->addElementPrefixPath('ReverseUniForm\Decorator', 'ReverseUniForm/Decorator', 'decorator');

		$this->addPrefixPath('ReverseUniForm\Element', 'ReverseUniForm/Element/', 'element');
		
		$this->addElementPrefixPath('ReverseUniForm\Validate', 'ReverseUniForm/Validate/', 'validate');
		
		//$this->addElementPrefixPath('Reverse_Filter', 'Reverse/Filter/', 'filter');

		$Fieldset = new Fieldset(array('class' => 'inlineLabels'));
		
		$this->setDecorators(array('FormElements', $Fieldset, 'FormDecorator', 'JsHolder'));

		$this->setElementDecorators(array('CtrlHolder'));

		$this->setDisableLoadDefaultDecorators(false);
		
	}
	
}