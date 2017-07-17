<?php

include_once 'Helper.php';

class Processor
{
	private $return = [];

	public function processString($string)
	{
		$helper = new Helper();
		if (!isset($string['text']) || !$string['text'])
			return json_encode(['success' => false, 'error' => 'String is missing']);
		$text = html_entity_decode($string['text']);

		$separated = $helper->clearString($text, []);
		$return['email'] = $this->getEmail($separated);
		$return['phone'] = $this->getPhone($separated);

		$separated = $helper->clearString($text, [$return['email'], $return['phone']]);
		$return['name'] = $this->getName($separated);
		$separated = $helper->clearString($text, [$return['email'], $return['phone'], $return['name']]);
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
		$helper = new Helper();

		$partialParsing = false;
		$parsedPhone = false;
		$phone = '';

		foreach ($separated as $key => $value) {
			$p = $helper->cleanPhone($value);

			if (!is_numeric($p))
				continue;

			if (strlen($p) == 10) {
				$phone = $value;
				$parsedPhone = true;
			} elseif ($partialParsing) {
				$strPhone = $helper->cleanPhone($phone);
				if (strlen($strPhone) == 3 && (strlen($p) == 3 || strlen($p) == 7)) {
					$phone .= ' ' . $value;
				} elseif (strlen($strPhone) == 6 && strlen($p) == 4) {
					$phone .= ' ' . $value;
				}
			} elseif (strlen($p) == 3) {
				$phone = $value;
				$partialParsing = true;
			}

			if (strlen($helper->cleanPhone($phone)) == 10)
				$parsedPhone = true;

			if ($parsedPhone)
				break;
		}

		return $phone;
	}

	private function getName($separated)
	{
		$helper = new Helper();

		$v = $helper->array_pop($separated);
		$name_at_beginning = false;

		if (strlen($v) == 5 && is_numeric($v))
			$name_at_beginning = true;

		if (!$name_at_beginning) {
			$first_name = $helper->array_pop($separated);
			return $first_name . ' ' . $v;
		}

		$name = '';
		foreach ($separated as $v) {
			if (is_numeric($v))
				break;
			$name .= ' ' . $v;
		}

		return trim($name);
	}

	private function getAddress($separated)
	{
		return implode(' ', $separated);
	}
}