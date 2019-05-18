<?php
namespace Pewe\CountryCodes\Laravel\Facades;
use Illuminate\Support\Facades\Facade;

/**
* Country Facade class
*/
class Country extends Facade
{
	/**
   * Get the registered name of the component.
   *
   * @return string
	 */
  protected static function getFacadeAccessor() { 
  	return 'Pewe\CountryCodes\Laravel\Country'; 
  }
}