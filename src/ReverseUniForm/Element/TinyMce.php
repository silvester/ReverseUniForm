<?php
namespace ReverseUniForm\Element;

use Zend\Form\Element;
use ReverseUniForm\UniForm;

class TinyMce extends Element
{
	
	public function init()
	{
		
		parent::init();
		
		$this->getView()->headScript()
			->appendFile(UniForm::$_config['tinymce']['path'].'jscripts/tiny_mce/jquery.tinymce.js');
				
		$this->clearDecorators();
		
		$this->setAttrib('class', 'textInput');
		
		$this->addDecorator('ViewScript', array('viewScript' => 'TinyMce.phtml'));
		
	}
	
}