<?php

namespace ReverseUniForm\Decorator;
use Zend\Form\Decorator\AbstractDecorator;
use Zend\Form\Decorator\FileDecorator;

class CtrlHolder extends AbstractDecorator implements FileDecorator
{

	public function buildLabel()
	{

		$element = $this->getElement();
		
		if (stripos($element->getType(), 'submit') != false) {
			return '<p class="label"></p>';
		}
		
		$label = $element->getLabel();
		
		if ($translator = $element->getTranslator()) {
			$label = $translator->translate($label);
		}
		
		if ($element->isRequired()) {
			$label = '<em>*</em>'.$label;
		}

		return $element->getView()->formLabel($element->getName(), $label, array('escape' => false, 'for' => $element->getId()));
	}

	public function buildInput()
	{
		$element = $this->getElement();

		if (stripos($element->getType(), 'submit') != false) {
			$element->setAttrib('class', 'btn');
		} else {
			$element->setAttrib('class', 'textInput'.' '.$element->class);
		}

		$helper = $element->helper;
		return $element->getView()->$helper(
				$element->getName(), $element->getValue(), $element->getAttribs(), $element->options
		);
	}

	public function buildErrors()
	{
		$element = $this->getElement();
		$messages = $element->getMessages();
		if (empty($messages)) {
			return '';
		}
		return $element->getView()->formErrors($messages);
	}

	public function buildDescription()
	{
		$element = $this->getElement();
		$desc = $element->getDescription();
		if (empty($desc)) {
			return '';
		}
		
		if ($translator = $element->getTranslator()) {
			$desc = $translator->translate($desc);
		}
		
		return '<p class="formHint"><span>' . $desc . '</span></p>';
	}

	public function render($content)
	{
		
		$element = $this->getElement();

		if (!$element instanceof Zend\Form\Element) {		
			//return $content;
		}

		if (null === $element->getView()) {
			return $content;
		}
		
		if (stripos($element->getType(), 'hidden') != false) {
			return $content . $separator . $this->buildInput();
		}

		$separator = $this->getSeparator();
		$placement = $this->getPlacement();
		$label = $this->buildLabel();
		$input = $this->buildInput();
		$errors = $this->buildErrors();
		$desc = $this->buildDescription();

		if (strlen($errors) > 0) {
			$output = '<div class="ctrlHolder error">';
		} else {
			$output = '<div class="ctrlHolder">';
		}

		$output .= $label
				. $input
				. $errors
				. $desc
				. '</div>';

		switch ($placement) {
			case (self::PREPEND):
				return $output . $separator . $content;
			case (self::APPEND):
			default:
				return $content . $separator . $output;
		}
	}

}