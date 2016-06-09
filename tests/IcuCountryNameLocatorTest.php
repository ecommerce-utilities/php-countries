<?php
namespace Kir\CountryCodes;

class IcuCountryNameLocatorTest extends \PHPUnit_Framework_TestCase {
	public function testGetCountry() {
		$translator = new IcuCountryNameLocator('de', 'DE');
		$this->assertEquals('Vereinigte Staaten', $translator->getCountry('US'));
		$this->assertEquals('Deutschland', $translator->getCountry('DE'));
	}
}
