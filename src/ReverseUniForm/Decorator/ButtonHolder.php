<?php

namespace ReverseUniForm\Decorator;
use Zend\Form\Decorator\AbstractDecorator;

class ButtonHolder extends AbstractDecorator
{

	public function render($content)
	{
		
		$str = '<div class="buttonHolder">';
		
		$buttons = $this->getElement()->getElements();
		
		foreach($buttons as $button)
		{
			$helper = $button->helper;
			$str .= $button->getView()->$helper($button->getName(), $button->getLabel(), $button->getAttribs(), $button->options);
		}
		
		$str .= '</div>';
		
		return $str;

	}

}