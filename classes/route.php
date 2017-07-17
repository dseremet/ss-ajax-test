<?php

include 'Processor.php';


if (isset($_GET['form-process'])) {
	$processor = new Processor();
	print_r($processor->processString($_POST));
}
