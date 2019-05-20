<?php
require('Country.php');

$country_wrapper = new Pewe\CountryCodes\Country();

$list = $country_wrapper->getList();
$limit = count($list);
$offset = 0;
if(count($argv) > 1){
	$values = get_inputs(array_slice($argv, 1), ['offset' => $offset, 'limit' => $limit]);
	$offset = $values['offset'];
	$limit = $values['limit'];
}
$from = $offset + 1;
$total = $offset + $limit;
echo("Get country code data from $from to $total...\n");
foreach (array_slice($list, $offset, $limit) as $key => $item) {
	echo("Country iso2 code --> $key\n");
	print_r($item);
}

function get_inputs($inputs, $initial_values)
{
	$input_accepted = [ 'offset' => '--offset=', 'limit' => '--limit='];
	$values = $initial_values;
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