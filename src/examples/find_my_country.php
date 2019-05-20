<?php
require('Country.php');

$country_wrapper = new Pewe\CountryCodes\Country();
echo("Finding country code for: ($argv[1])...\n");
$item = $country_wrapper->find($argv[1]);
print_r($item);
