<?php
namespace Kir\CountryCodes;

use Kir\CountryCodes\Helpers\AbstractCultureAware;

class IcuCountryNameLocator extends AbstractCultureAware {
	/** @var array|null */
	private $provider = null;

	/**
	 * @param string $languageCode
	 * @param string $countryCode
	 */
	public function __construct($languageCode, $countryCode) {
		parent::__construct($languageCode, $countryCode);
		$this->provider = new IcuCountryListProvider($languageCode, $countryCode);
	}

	/**
	 * @param string $countryCode
	 * @return string
	 */
	public function getCountry($countryCode) {
		$list = $this->provider->getCountries();
		if(array_key_exists($countryCode, $list)) {
			return $list[$countryCode];
		}
		throw new CountryNotFoundException(sprintf("Country %s not found in %s", $countryCode, $this->getCulture()));
	}
}