<?php
namespace Kir\CountryCodes;

class EuCountryProviderTest extends \PHPUnit_Framework_TestCase {
	public function testGetCodes() {
		$provider = new EuCountryProvider('de', 'DE');
		$codes = $provider->getCodes();
		$this->assertCount(28, $codes);
	}

	public function testGetList() {
		$provider = new EuCountryProvider('de', 'DE');
		$list = $provider->getList();
		$this->assertCount(28, $list);
	}

	public function testIterator() {
		$provider = new EuCountryProvider('de', 'DE');
		$list = iterator_to_array($provider);
		$this->assertCount(28, $list);
	}
}
