[![Build Status](https://travis-ci.org/iamalirezaj/faker.svg)](https://travis-ci.org/iamalirezaj/faker)
[![Latest Stable Version](https://poser.pugx.org/josh/faker/v/stable)](https://packagist.org/packages/josh/faker)
[![Total Downloads](https://poser.pugx.org/josh/faker/downloads)](https://packagist.org/packages/josh/faker)
[![Latest Unstable Version](https://poser.pugx.org/josh/faker/v/unstable)](//packagist.org/packages/josh/faker)
[![License](https://poser.pugx.org/josh/faker/license)](https://packagist.org/packages/josh/faker)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/iamalirezaj/faker/badges/quality-score.png)](https://scrutinizer-ci.com/g/iamalirezaj/faker)
[![Say Thanks!](https://img.shields.io/badge/Say%20Thanks-!-1EAEDB.svg)](https://saythanks.io/to/iamalirezaj)
# Josh faker component
A persian faker library for php

## Requirement
* php 5.6 >=

## Install with composer
You can install this package throw the [Composer](http://getcomposer.org) by running:
```
composer require josh/faker
```

## Usage
You can access to faker objects by according blew following table:

```php
// use the faker namespace

use Josh\Faker\Faker;
```

| Objects | Descriptions |
| --- | --- |
| ``` Faker::firstname() ``` | Return random firstname |
| ``` Faker::lastname() ``` | Return random lastname |
| ``` Faker::fulltname() ``` | Return random fullname |
| ``` Faker::company() ``` | Return random company name |
| ``` Faker::mobile() ``` | Return random mobile number |
| ``` Faker::telephone() ``` | Return random telephone number |
| ``` Faker::email() ``` | Return random email address |
| ``` Faker::domain() ``` | Return random domain |
| ``` Faker::website() ``` | Return random website address |
| ``` Faker::pageUrl() ``` | Return random pageUrl |
| ``` Faker::age($min,$max) ``` | Return random age arguments*("Min" , "Max") |
| ``` Faker::address() ``` | Return random postal address |
| ``` Faker::city() ``` | Return random city name |
| ``` Faker::meliCode() ``` | Return random meli code |

## License
The MIT License (MIT). Please see [License File](LICENSE) for more information.
