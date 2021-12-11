<?php
namespace Kir\CountryCodes;

use ArrayIterator;
use IteratorAggregate;
use Kir\CountryCodes\Helpers\AbstractCultureAware;
use Traversable;

/**
 * @implements IteratorAggregate<string, string>
 */
class EuCountryProvider extends AbstractCultureAware implements IteratorAggregate {
	/** @var IcuCountryListProvider */
	private $provider;

	/**
	 * @var array<int, string>
	 */
	private $codes = [
		'BE',
		'BG',
		'CZ',
		'DK',
		'DE',
		'EE',
		'IE',
		'ES',
		'FR',
		'GR',
		'HR',
		'IT',
		'CY',
		'LV',
		'LT',
		'LU',
		'HU',
		'MT',
		'NL',
		'AT',
		'PL',
		'PT',
		'RO',
		'SI',
		'SK',
		'FI',
		'SE',
	];

	/**
	 * @param string $languageCode
	 * @param string $countryCode
	 */
	public function __construct($languageCode, $countryCode) {
		parent::__construct($languageCode, $countryCode);
		$this->provider = new IcuCountryListProvider($languageCode, $countryCode);
	}

	/**
	 * @return string[]
	 */
	public function getCodes() {
		return $this->codes;
	}

	/**
	 * @return string[]
	 */
	public function getList() {
		return $this->provider->getCountries($this->codes);
	}

	/**
	 * @return ArrayIterator<string, string>
	 */
	public function getIterator(): ArrayIterator {
		return new ArrayIterator($this->getList());
	}
}
