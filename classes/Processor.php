<?php

/**
 * Created by PhpStorm.
 * User: damirseremet
 * Date: 16/07/2017
 * Time: 16:37
 */
class Processor
{
	private $return = [];

	public function processString($string)
	{
		if (!isset($string['text']) || !$string['text'])
			return json_encode(['success' => false, 'error' => 'String is missing']);
		$text = html_entity_decode($string['text']);

		$separated = explode(' ', $text);

		$return['email'] = $this->getEmail($separated);
		$return['phone'] = $this->getPhone($separated);
		$return['name'] = $this->getName($separated);
		$return['address'] = $this->getAddress($separated);

		return json_encode(['success' => true, 'message' => $return]);
	}

	private function getEmail($separated)
	{
		foreach ($separated as $value) {
			if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
				return $value;
			}
		}
		return '';
	}

	//TODO: check if phone is separated and in different parts of array
	private function getPhone($separated)
	{
		$isPhone = $parsedPhone = false;
		$phone = '';
		foreach ($separated as $key => $value) {
			$p = preg_replace('/[^A-Za-z0-9\-]/', '', $value);
			if ((strlen($p) == 3 || strlen($p) == 10) && is_numeric($p)) {
				$phone = $value;
			}

		}

		return $phone;
	}

	//TODO: cleaned string, check if name is in the end (after zip code) or at the beginning
	private function getName($separated)
	{

	}

	//TODO: clean the string from retrieved values and get trimmed address
	private function getAddress($separated)
	{

	}

}