<?php

class Helper
{
	public function cleanPhone($phone)
	{
		return preg_replace('/[^A-Za-z0-9\-]/', '', str_replace('-', '', $phone));
	}

	public function clearString($string, $array)
	{
		$string = trim($string);
		if (count($array)) {
			foreach ($array as $ar) {
				$string = str_replace($ar, '', $string);
			}
		}
		return explode(' ', $string);
	}

	public function array_pop(&$array){
		$return = array_pop($array);
		if($return!='')
			return $return;
		else
			return $this->array_pop($array);

	}

	public function array_shift(&$array){
		$return = array_shift($array);
		if($return!='')
			return $return;
		else
			return $this->array_shift($array);

	}
}