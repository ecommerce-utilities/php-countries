<?php
namespace Kir\CountryCodes;

class CountryCodeConverterTest extends \PHPUnit_Framework_TestCase {
	public function test() {
		$converter = new CountryCodeConverter();

		$this->assertEquals('DE', $converter->convert('DE', $converter::ISO3166_2, $converter::ISO3166_2));
		$this->assertEquals('276', $converter->convert('DE', $converter::ISO3166_2, $converter::ISO3166NUM));
		$this->assertEquals('DE', $converter->convert('DE', $converter::ISO3166_2, $converter::ISO3166ALPHA2));
		$this->assertEquals('DEU', $converter->convert('DE', $converter::ISO3166_2, $converter::ISO3166ALPHA3));
		$this->assertEquals('.de', $converter->convert('DE', $converter::ISO3166_2, $converter::TLD));
		$this->assertEquals('GER', $converter->convert('DE', $converter::ISO3166_2, $converter::IOC));
		$this->assertEquals('DE', $converter->convert('DE', $converter::ISO3166_2, $converter::UN_LOCODE));

		$this->assertEquals('DE', $converter->convert('DE', $converter::ISO3166_2, $converter::ISO3166_2));
		$this->assertEquals('DE', $converter->convert('276', $converter::ISO3166NUM, $converter::ISO3166_2));
		$this->assertEquals('DE', $converter->convert('DE', $converter::ISO3166ALPHA2, $converter::ISO3166_2));
		$this->assertEquals('DE', $converter->convert('DEU', $converter::ISO3166ALPHA3, $converter::ISO3166_2));
		$this->assertEquals('DE', $converter->convert('.de', $converter::TLD, $converter::ISO3166_2));
		$this->assertEquals('DE', $converter->convert('GER', $converter::IOC, $converter::ISO3166_2));
		$this->assertEquals('DE', $converter->convert('DE', $converter::UN_LOCODE, $converter::ISO3166_2));

		$this->assertNotEquals('DEU', $converter->convert('DEU', $converter::ISO3166ALPHA3, $converter::IOC));
	}
}
