<?php
namespace Kir\CountryCodes\Helpers;

class AbstractCultureAware {
	/** @var string */
	private $languageCode;
	/** @var string */
	private $countryCode;

	/**
	 * @param string $languageCode
	 * @param string $countryCode
	 */
	public function __construct($languageCode, $countryCode) {
		$this->languageCode = $languageCode;
		$this->countryCode = $countryCode;
	}

	/**
	 * @return string
	 */
	protected function getLanguageCode() {
		return $this->languageCode;
	}

	/**
	 * @param string $languageCode
	 * @return $this
	 */
	protected function setLanguageCode($languageCode) {
		$this->languageCode = $languageCode;
		return $this;
	}

	/**
	 * @return string
	 */
	protected function getCountryCode() {
		return $this->countryCode;
	}

	/**
	 * @param string $countryCode
	 * @return $this
	 */
	protected function setCountryCode($countryCode) {
		$this->countryCode = $countryCode;
		return $this;
	}

	/**
	 * @return string
	 */
	protected function getCulture() {
		return "{$this->languageCode}_{$this->countryCode}";
	}
}