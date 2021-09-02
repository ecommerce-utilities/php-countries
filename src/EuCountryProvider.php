<?php
namespace Kir\CountryCodes;

use ArrayIterator;
use IteratorAggregate;
use Kir\CountryCodes\Helpers\AbstractCultureAware;
use Traversable;

class EuCountryProvider extends AbstractCultureAware implements IteratorAggregate {
	/** @var IcuCountryListProvider */
	private $provider = null;

	/**
	 * @var string
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
	 * @return Traversable
	 */
	public function getIterator() {
		return new ArrayIterator($this->getList());
	}
}
