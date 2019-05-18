<?php
namespace Pewe\CountryCodes\Laravel;
use Pewe\CountryCodes\Country as CountryWrapper;

/**
 * Country Laravel class
 */
class Country
{
	private $country;

	function __construct(CountryWrapper $country)
	{
		$this->country = $country;
	}
	
	public function getList()
	{
		return collect($this->country->getList())
		->map(function($item, $key){
			return collect($item);
		});
	}

	public function find($iso2)
	{
		$result = $this->country->find($iso2);
		return $result ? collect($result): $result;
	}
}