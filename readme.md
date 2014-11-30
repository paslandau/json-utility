#json-utility
[![Build Status](https://travis-ci.org/paslandau/json-utility.svg?branch=master)](https://travis-ci.org/paslandau/json-utility)

Library to extend PHP core functions by common (missing) JSON functions

##Description
[todo]

##Requirements

- PHP >= 5.5

##Installation

The recommended way to install json-utility is through [Composer](http://getcomposer.org/).

    curl -sS https://getcomposer.org/installer | php

Next, update your project's composer.json file to include JsonUtility:

    {
        "repositories": [ { "type": "composer", "url": "http://packages.myseosolution.de/"} ],
        "minimum-stability": "dev",
        "require": {
             "paslandau/json-utility": "dev-master"
        }
    }

After installing, you need to require Composer's autoloader:
```php

require 'vendor/autoload.php';
```