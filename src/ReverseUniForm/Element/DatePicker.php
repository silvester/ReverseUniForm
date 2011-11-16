<?php
namespace ReverseUniForm\Element;

use Zend\Form\Element;
use ReverseUniForm\UniForm;

class DatePicker extends Element
{

	public function init()
	{

		parent::init();
		
		$this->getView()->headScript()
			->appendFile(UniForm::$_config['jqueryui']['path'] . 'development-bundle/ui/minified/jquery.ui.core.min.js')
			->appendFile(UniForm::$_config['jqueryui']['path'] . 'development-bundle/ui/minified/jquery.ui.datepicker.min.js')
			//->appendFile(UniForm::$_config['path']['jqueryui'] . '/i18n/jquery.ui.datepicker-' . $this->getLocaleLanguage() . '.js');
			->appendFile(UniForm::$_config['jqueryui']['path'] . 'development-bundle/ui/i18n/jquery.ui.datepicker-sl.js');

		$this->getView()->headLink()->appendStylesheet(
				UniForm::$_config['jqueryui']['path'] . 'development-bundle/themes/' . UniForm::$_config['jqueryui']['theme'] . '/jquery.ui.all.css'
		);

		$this->clearDecorators();

		$this->setAttrib('class', 'textInput');

		$this->addDecorator('ViewScript', array('viewScript' => 'DatePicker.phtml'));
		
	}

}