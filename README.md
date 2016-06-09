rkr/countries
=============

[![Build Status](https://travis-ci.org/ecommerce-utilities/php-countries.svg)](https://travis-ci.org/ecommerce-utilities/php-countries)
[![Latest Stable Version](https://poser.pugx.org/rkr/countries/v/stable)](https://packagist.org/packages/rkr/countries)
[![License](https://poser.pugx.org/rkr/countries/license)](https://packagist.org/packages/rkr/countries)

The country-codes are copied from [umpirsky/country-list](https://github.com/umpirsky/country-list). I've only added some code-locators and some translators and removed all those formats not suited for my needs.
 
## Some examples

### Get all countries

```PHP
$provider = new IcuCountryListProvider('en', 'GB');
print_r($provider->getCountries());
```

```
Array
(
    [AF] => Afghanistan
    [AX] => Åland Islands
    [AL] => Albania
    [DZ] => Algeria
    [AS] => American Samoa
    [AD] => Andorra
    [AO] => Angola
    [AI] => Anguilla
    (248 more ...)
)
```

### Get the name of a specific country

```PHP
$provider = new IcuCountryNameLocator('en', 'GB');
echo $provider->getCountry('DE');
```

`Germany`

### Get all EU-countries:

```PHP
$provider = new EuCountryProvider('en', 'GB');
print_r($provider->getList());
```

```
Array
(
    [BE] => Belgium
    [BG] => Bulgaria
    [CZ] => Czech Republic
    [DK] => Denmark
    [DE] => Germany
    [EE] => Estonia
    [IE] => Ireland
    (22 more ...)
)
```
