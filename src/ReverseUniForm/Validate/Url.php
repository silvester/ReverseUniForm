<?php

namespace ReverseUniForm\Validate;
use Zend\Validator\AbstractValidator, Zend\Uri\Uri;

class Url extends AbstractValidator
{
	const INVALID = 'uriInvalid';
	const INVALID_FORMAT = 'uriInvalidFormat';


	protected $_messageTemplates = array(
		self::INVALID => "Invalid type given, value should be a string",
		self::INVALID_FORMAT => "'%value%' is no valid URI in the basic format http://domain.tld",
	);

	public function isValid($value)
	{
		if (!is_string($value)) {
			$this->_error(self::INVALID);
			return false;
		}

		$this->setValue($value);

		if (Uri::isValidDnsHostname($value)) {
			return true;
		}

		$this->_error(self::INVALID_FORMAT);
		return false;
	}

}

