<?php
namespace Kir\CountryCodes;

use ArrayIterator;
use IteratorAggregate;
use Kir\CountryCodes\Helpers\AbstractCultureAware;
use Traversable;

class IcuCountryListProvider extends AbstractCultureAware implements IteratorAggregate {
	/** @var array|null */
	private $list = null;

	/**
	 * @param array $filter
	 * @return string[] A key-value array with all countries known. Key = ISO2-Code, value = name of the country.
	 */
	public function getCountries(array $filter = null) {
		$list = $this->getCachedList();
		if($filter !== null) {
			$result = [];
			$filter = array_map('strtoupper', $filter);
			foreach($filter as $code) {
				if(array_key_exists($code, $list)) {
					$result[$code] = $list[$code];
				}
			}
			return $result;
		}
		return $list;
	}

	/**
	 * @return Traversable
	 */
	public function getIterator() {
		return new ArrayIterator($this->getCountries());
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
		$list = $this->incl(__DIR__."/../codes/{$this->getLanguageCode()}/icu-countries.php");
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
}
