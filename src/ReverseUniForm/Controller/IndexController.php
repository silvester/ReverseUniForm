<?php

namespace ReverseUniForm\Controller;

use Zend\Mvc\Controller\ActionController;
use ReverseUniForm\UniForm;
use Zend\Form\Decorator\ViewScript;

class IndexController extends ActionController
{
    public function indexAction()
    {

		$form = new UniForm;

		$form->addElement('Gmap', 'gmap',
			array('label' => 'Google maps', 'description' => "var map = $('#gmap').data('map'); returns the map."));

		$form->addElement('text', 'lat', array('label' => 'Latitude', 'class' => 'textInput', 'required' => true));
		$form->addElement('text', 'lng', array('label' => 'Longitude', 'class' => 'textInput', 'required' => true));

		$form->addDisplayGroup(array('lat', 'lng'), 'coor', array('legend' => 'CtrlMultiHolder decorator'));

		$dec = new ViewScript;
		$dec->setViewScript('CtrlMultiHolder.phtml');

		$form->coor->clearDecorators()->addDecorator($dec);

		$form->addElement('select', 'select', array('label' => 'Select', 'multiOptions' => array('da', 'ne')));

		$form->addElement('Radio', 'radio', array('label' => 'Radio', 'multiOptions' => array('da', 'ne')));

		$form->addElement('Checkbox', 'checkbox', array('label' => 'Checkbox', 'multiOptions' => array('da', 'ne')));

		$form->addElement('text', 'url', array('label' => 'Text', 'required' => true));
		$form->url->addValidator('Hostname');

		$form->addElement('textarea', 'content_short',
			array('label' => 'Textarea', 'required' => true, 'rows' => '',  'cols' => '', 'class' => 'large full', 'style' => 'height:5em;'));

		$form->addElement('DatePicker', 'date', array('label' => 'DatePicker', 'required' => true));
		$form->date->addValidator('alnum');

		$form->addElement('DateTimePicker', 'datetime',
			array('label' => 'DateTimePicker', 'description' => 'Datetime picker', 'required' => true));

		$form->addElement('TinyMce', 'content',
			array('label' => 'Tinymce', 'style' => 'height:20em;', 'description' => 'Tinymce html area', 'required' => true));

		$form->addElement('submit', 'poslji', array('value' => 'send', 'class' => 'btn btn-large btn-primary'));
		$form->addElement('button', 'reset', array('value' => 'reset', 'class' => 'btn btn-large'));

		$form->addDisplayGroup(array('poslji', 'reset'), 'buttons', array('decorators' => array('ButtonHolder')));


		if(count($_POST) > 0){ $form->isValid($_POST); }

        return array('form' => $form);

    }
}
