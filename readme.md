#JsonUtility
[![Build Status](https://travis-ci.org/paslandau/JsonUtility.svg?branch=master)](https://travis-ci.org/paslandau/JsonUtility)

Library to extend PHP core functions by common (missing) JSON functions

##Description
[todo]

##Requirements

- PHP >= 5.5

##Installation

The recommended way to install JsonUtility is through [Composer](http://getcomposer.org/).

    curl -sS https://getcomposer.org/installer | php

Next, update your project's composer.json file to include JsonUtility:

    {
        "repositories": [
            {
                "type": "git",
                "url": "https://github.com/paslandau/JsonUtility.git"
            }
        ],
        "require": {
             "paslandau/JsonUtility": "~0"
        }
    }

After installing, you need to require Composer's autoloader:
```php

require 'vendor/autoload.php';
```