<?php
namespace Kir\CountryCodes;

class IcuCountryNameLocatorTest extends \PHPUnit_Framework_TestCase {
	public function testGetCountry() {
		$translator = new IcuCountryNameLocator('de', 'DE');
		$this->assertEquals('Vereinigte Staaten', $translator->getCountry('US'));
		$this->assertEquals('Deutschland', $translator->getCountry('DE'));
	}

	public function testGetCountries() {
		$translator = new IcuCountryNameLocator('de', 'DE');
		$list = $translator->getCountries();
		$this->assertArrayHasKey('DE', $list);
		$this->assertArrayHasKey('US', $list);
		$this->assertEquals('Vereinigte Staaten', $list['US']);
		$this->assertEquals('Deutschland', $list['DE']);
	}
}
