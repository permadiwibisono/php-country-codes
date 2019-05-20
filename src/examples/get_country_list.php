<?php
require('Country.php');

$country_wrapper = new Pewe\CountryCodes\Country();

$list = $country_wrapper->getList();

foreach ($list as $key => $item) {
	echo("Country iso2: $key\n");
	print_r($item);
}