<?php

namespace ReverseUniForm\Decorator;

use Zend\Form\Decorator\AbstractDecorator;

class JsHolder extends AbstractDecorator
{

	public function render($content)
	{
		
		$jsContent = $this->getElement()->getView()->placeholder('UniForm');

		if (strlen($jsContent) > 0) {
			return $content . '<script type="text/javascript">$(document).ready(function(){' . $jsContent . '});</script>';
		} else {
			return $content;
		}
		
	}

}