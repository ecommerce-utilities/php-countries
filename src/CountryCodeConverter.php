<?php
namespace Kir\CountryCodes;

class CountryCodeConverter {
	const ISO3166ALPHA2 = 'ISO 3166 ALPHA-2';
	const ISO3166ALPHA3 = 'ISO 3166 ALPHA-3';
	const ISO3166NUM = 'ISO 3166 NUM';
	const TLD = 'TLD';
	const IOC = 'IOC';
	const ISO3166_2 = 'ISO 3166-2';
	const UN_LOCODE = 'UN/LOCODE';

	/**
	 * @param string $code
	 * @param string $from
	 * @param string $to
	 * @return string
	 */
	public function convert($code, $from, $to) {
		static $list = null;
		if($list === null) {
			$list = require __DIR__.'/../codes/codes.php';
		}
		$med = $list[$from]['from'][$code];
		return $list[$to]['to'][$med];
	}
}