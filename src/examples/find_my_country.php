<?php
require('Country.php');

$country_wrapper = new Pewe\CountryCodes\Country();
if(count($argv) > 1){
	list($a, $input) = $argv;
	$values = get_inputs(array_slice($argv, 1));
	if(!count($values)) throw new Exception("missing an argument --iso2. (--iso2=id) for example.");
	$code = $values['code'];
	echo("Finding country code for --> $code...\n");
	$item = $country_wrapper->find($code);
	print_r($item);
}
else{
	throw new Exception("missing an argument --iso2. (--iso2=id) for example.");
}

function get_inputs($inputs)
{
	$input_accepted = [ 'code' => '--iso2='];
	$values = [];
	foreach ($inputs as $input) {
		foreach ($input_accepted as $key => $value) {
			$regex = "/^$value/";
			if(preg_match($regex, $input)){
				$values[$key] = preg_replace($regex, "", $input);
				break;
			}
		}
	}
	return $values;
}
