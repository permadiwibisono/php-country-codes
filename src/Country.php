<?php
namespace Pewe\CountryCodes;

/**
 * Country class
 */
class Country
{
	private function sync()
	{
		$results = array();
		$string = file_get_contents("http://country.io/iso3.json");
		$json_a = json_decode($string, true);
		foreach ($json_a as $key => $value) {
			$results[$key] = array('iso3' => $value);
		}
		$string = file_get_contents("http://country.io/continent.json");
		$json_a = json_decode($string, true);
		foreach ($json_a as $key => $value) {
			$results[$key]['continent_code'] = $value;
		}
		$string = file_get_contents("http://country.io/names.json");
		$json_a = json_decode($string, true);
		foreach ($json_a as $key => $value) {
			$results[$key]['name'] = $value;
		}
		$string = file_get_contents("http://country.io/capital.json");
		$json_a = json_decode($string, true);
		foreach ($json_a as $key => $value) {
			$results[$key]['capital'] = $value;
		}
		$string = file_get_contents("http://country.io/phone.json");
		$json_a = json_decode($string, true);
		foreach ($json_a as $key => $value) {
			$results[$key]['phone_code'] = $value;
		}
		$string = file_get_contents("http://country.io/currency.json");
		$json_a = json_decode($string, true);
		foreach ($json_a as $key => $value) {
			$results[$key]['currency_code'] = $value;
		}
		$fp = fopen('countries.json', 'w', FILE_USE_INCLUDE_PATH);
		fwrite($fp, json_encode($results, JSON_PRETTY_PRINT));   //here it will print the array pretty
		fclose($fp);
	}

	private function _getJson()
	{
		$string = file_get_contents("countries.json", FILE_USE_INCLUDE_PATH);
		return json_decode($string, true);
	}

	public function getList()
	{
		$results = array();
		$json = $this->_getJson();
		foreach ($json as $key => $value) {
			$results[$key] = $value;
		}
		return $results;
	}

	public function find($iso2)
	{
		$result = null;
		$countries = $this->getList();
		$iso2 = strtoupper($iso2);
		if(array_key_exists($iso2, $countries)) $result = $countries[$iso2];
		return $result;
	}
}