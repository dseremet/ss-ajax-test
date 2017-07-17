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


		$separated = $this->clearString($text, []);
		$return['email'] = $this->getEmail($separated);
		$return['phone'] = $this->getPhone($separated);

		$separated = $this->clearString($text, [$return['email'], $return['phone']]);
		$return['name'] = $this->getName($separated);
		$separated = $this->clearString($text, [$return['email'], $return['phone'], $return['name']]);
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
		$partialParsing = $parsedPhone = false;
		$phone = '';
		foreach ($separated as $key => $value) {

			$p = $this->cleanPhone($value);
			if (!is_numeric($p))
				continue;

			if (strlen($p) == 10) {
				$phone = $value;
				$parsedPhone = true;
			} elseif (strlen($p) == 3) {
				$phone = $value;
				$partialParsing = true;
			} elseif ($partialParsing) {
				$strPhone = $this->cleanPhone($phone);
				if (strlen($strPhone) == 3 && (strlen($p) == 3 || strlen($p) == 7)) {
					$phone .= ' ' . $value;
				} elseif (strlen($strPhone) == 6 && strlen($p) == 4) {
					$phone .= ' ' . $value;
				}
			}
			if ($parsedPhone || strlen($this->cleanPhone($phone)) == 10)
				break;
		}

		return $phone;
	}

	private function getName($separated)
	{
		$v = array_pop($separated);
		$name_at_beginning = false;
		if (strlen($v) == 5 && is_numeric($v))
			$name_at_beginning = true;

		if (!$name_at_beginning) {
			$first_name = array_pop($separated);
			return $first_name . ' ' . $v;
		}
		$first_name = array_shift($separated);
		$last_name = array_shift($separated);
		return $first_name . ' ' . $last_name;
	}

	private function getAddress($separated)
	{
		return implode(' ', $separated);
	}

	private function cleanPhone($phone)
	{
		return preg_replace('/[^A-Za-z0-9\-]/', '', str_replace('-', '', $phone));
	}

	private function clearString($string, $array)
	{
		$string = trim($string);
		if (count($array)) {
			foreach ($array as $ar) {
				$string = str_replace($ar, '', $string);
			}
		}
		return explode(' ', $string);
	}
}