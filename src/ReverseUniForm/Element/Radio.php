<?php
namespace ReverseUniForm\Element;

use ReverseUniForm\Element\AbstractElement;

class Radio extends AbstractElement
{

	public $elementType = 'radio';
	
	public function init()
	{

		parent::init();
		
		$this->clearDecorators();

		$this->setAttrib('class', 'textInput');

		$this->addDecorator('ViewScript', array('viewScript' => 'Multi.phtml'));
		
	}

}