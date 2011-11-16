<?php

namespace ReverseUniForm\Element;

use Zend\Form\Element;

class Gmap extends Element
{
	
	public function init()
	{

		//parent::init();
		
		$this->clearDecorators();

		$this->setAttrib('class', 'textInput');

		$this->addDecorator('ViewScript', array('viewScript' => 'Gmap.phtml'));
		
	}

}