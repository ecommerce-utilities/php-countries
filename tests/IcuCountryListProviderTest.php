<?php
namespace Kir\CountryCodes;

class IcuCountryListProviderTest extends \PHPUnit_Framework_TestCase {
	public function testGetCountries() {
		$translator = new IcuCountryListProvider('de', 'DE');
		$list = $translator->getCountries();
		$this->assertArrayHasKey('DE', $list);
		$this->assertArrayHasKey('US', $list);
		$this->assertEquals('Vereinigte Staaten', $list['US']);
		$this->assertEquals('Deutschland', $list['DE']);
	}

	public function testIterator() {
		$translator = new IcuCountryListProvider('de', 'DE');
		$list = iterator_to_array($translator);
		$this->assertArrayHasKey('DE', $list);
		$this->assertArrayHasKey('US', $list);
		$this->assertEquals('Vereinigte Staaten', $list['US']);
		$this->assertEquals('Deutschland', $list['DE']);
	}
}
