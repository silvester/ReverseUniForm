<?php

namespace ReverseUniForm\Element;

use Zend\Form\Element;
use ReverseUniForm\UniForm;

class DateTimePicker extends Element
{

	public function init()
	{
		
		parent::init();
		
		$this->getView()->headScript()
			->appendFile(UniForm::$_config['jqueryui']['path'] . 'development-bundle/ui/minified/jquery.ui.core.min.js')
			->appendFile(UniForm::$_config['jqueryui']['path'] . 'development-bundle/ui/minified/jquery.ui.widget.min.js')
			->appendFile(UniForm::$_config['jqueryui']['path'] . 'development-bundle/ui/minified/jquery.ui.datepicker.min.js')
			->appendFile(UniForm::$_config['jqueryui']['path'] . 'development-bundle/ui/i18n/jquery.ui.datepicker-sl.js')
			->appendFile(UniForm::$_config['jqueryui']['path'] . 'development-bundle/ui/minified/jquery.ui.mouse.min.js')
			->appendFile(UniForm::$_config['jqueryui']['path'] . 'development-bundle/ui/minified/jquery.ui.slider.min.js')
			->appendFile(UniForm::$_config['timepicker']['path'] . 'jquery-ui-timepicker-addon.js');
			//->appendFile(UniForm::$_config['timepicker']['path'] . '/localization/jquery-ui-timepicker-'.$this->getLocaleLanguage().'.js');

		$this->getView()->headLink()
			->appendStylesheet(UniForm::$_config['jqueryui']['path'] . 'development-bundle/themes/' . UniForm::$_config['jqueryui']['theme'] . '/jquery.ui.all.css')
			->appendStylesheet(UniForm::$_config['timepicker']['path'] . 'jquery-ui-timepicker-addon.css');

		$this->clearDecorators();

		$this->setAttrib('class', 'textInput');

		$this->addDecorator('ViewScript', array('viewScript' => 'DateTimePicker.phtml'));
	}

}

?>