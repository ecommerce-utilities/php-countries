<?php
namespace Kir\CountryCodes;

class IcuCountryNameLocator {
	/** @var string */
	private $languageCode;
	/** @var string */
	private $countryCode;
	/** @var array|null */
	private $list = null;

	/**
	 * @param string $languageCode
	 * @param string $countryCode
	 */
	public function __construct($languageCode, $countryCode) {
		$this->languageCode = $languageCode;
		$this->countryCode = $countryCode;
	}

	/**
	 * @param string $countryCode
	 * @return string
	 */
	public function getCountry($countryCode) {
		$list = $this->getCachedList();
		if(array_key_exists($countryCode, $list)) {
			return $list[$countryCode];
		}
		throw new CountryNotFoundException(sprintf("Country %s not found in %s", $countryCode, $this->getCulture()));
	}

	/**
	 * @param array $filter
	 * @return string[] A key-value array with all countries known. Key = ISO2-Code, value = name of the country.
	 */
	public function getCountries(array $filter = null) {
		$list = $this->getCachedList();
		$result = [];
		if($filter !== null) {
			$filter = array_map('strtoupper', $filter);
			foreach($filter as $code) {
				if(array_key_exists($code, $list)) {
					$result[$code] = $list[$code];
				}
			}
		}
		return $list;
	}

	/**
	 * @return array
	 * @throws SourceNotFoundException
	 */
	private function getCachedList() {
		if($this->list === null) {
			$this->list = $this->getList();
		}
		return $this->list;
	}

	/**
	 * @return array
	 * @throws SourceNotFoundException
	 */
	private function getList() {
		$result = $this->incl(__DIR__."/../codes/en/icu-countries.php");
		$list = $this->incl(__DIR__."/../codes/{$this->languageCode}/icu-countries.php");
		$result = array_merge($result, $list);
		$list = $this->incl(__DIR__."/../codes/{$this->getCulture()}/icu-countries.php");
		return array_merge($result, $list);
	}

	private function incl($filename) {
		/** @noinspection PhpIncludeInspection */
		$list = @include $filename;
		if(!is_array($list)) {
			return array();
		}
		return $list;
	}

	/**
	 * @return string
	 */
	private function getCulture() {
		return "{$this->languageCode}_{$this->countryCode}";
	}
}