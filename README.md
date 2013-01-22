Inflexible  [![Build Status](https://travis-ci.org/borisguery/Inflexible.png?branch=master)](https://travis-ci.org/borisguery/Inflexible)
=======================

Table of contents
-----------------

1. [Description](#description)
2. [Installation](#installation)
3. [Usage](#usage)
 1. [Available inflectors](#available-inflectors)
   1. [Datetime](#datetime)
     1. [Relative](#relative)
   2. [Number](#number)
     1. [HumanByte](#humanbyte)
     2. [Ordinalize](#ordinalize)
     3. [Shorten](#shorten)
     4. [Textualize](#textualize)
   3. [String](#string)
     1. [Camelize](#camelize)
     2. [Denamespace](#denamespace)
     3. [Humanize](#humanize)
     4. [NamespaceOnly](#namespaceonly)
     5. [Slugify](#slugify)
4. [Run the test](#run-the-test)
5. [Contributing](#contributing)
6. [Requirements](#requirements)
7. [Authors](#authors)
8. [License](#license)

Description
-----------

Inflexible aims to gather a collection of commonly used Inflectors into a single lib.

Installation
------------

Using [Composer](http://getcomposer.org/), just `$ composer require borisguery/inflexible` package or:

``` javascript
{
  "require": {
    "borisguery/inflexible": "dev-master"
  }
}
```

Usage
-----

### Available inflectors

#### Datetime

##### Relative

Convert a `DateTime` object or a number of seconds into the most fitted unit:

```php
Inflexible::relativeDatetime(86400);
```

Returns

```php
array(
    1,
    'day'
)
```

You may also want to get the relative datetime from a given date:


```php
Inflexible::relativeDatetime(new DateTime('2012-01-10'), new DateTime('2012-01-17'));
```

Returns

```php
array(
    1,
    'week'
)
```

The available units are:

* second
* minute
* hour
* day
* week
* month
* year

#### Number

##### HumanByte

Convert bytes to an human readable representation to the most fitted unit:

```php
Inflexible::humanByte(1024);
// 1.00 KB
```

```php
Inflexible::humanByte(1048576);
// 1.00 MB
```

```php
Inflexible::humanByte(1073741824);
// 1.00 GB
```

You may also provided an optional precision as a second argument (default to 2)


##### Ordinalize

Converts number to its ordinal English form:

```php
Inflexible::ordinalize(1);
// 1st
```

```php
Inflexible::ordinalize(13);
// 13th
```

##### Shorten

Formats a number using the SI units (k, M, G, etc.):

```php
Inflexible::shorten(100);
// array(100, null)
// No units for number < 1000
```

```php
Inflexible::shorten(1523);
// 1k
```

##### Textualize

Returns the textual representation of a number

```php
Inflexible::textualize(1025433);
// One Million, Twenty Five Thousand, Four Hundred and Thirty Three
```


#### String

##### Camelize
Converts a word like "foo_bar" to "FooBar".
It also removes non-alphanumeric characters:

```php
Inflexible::camelize('foo_bar');
// FooBar
```

##### Denamespace

Returns only the class name

```php
Inflexible::denamespace('\Foo\Bar\Baz');
// Baz
```

##### Humanize

Converts CamelCased word and underscore to space to return a readable string:

```php
Inflexible::humanize('foo_bar');
// Foo Bar
```

```php
Inflexible::humanize('FooBar');
// Foo Bar
```

##### NamespaceOnly

Returns the namespace of a fully qualified class name:

```php
Inflexible::namespaceOnly('\Foo\Bar\Baz');
// Foo\Bar
```

##### Slugify

Slugify a string:

```php
Inflexible::namespaceOnly('lo\rem ipsum do|or sid amet||| #\`[|\" 10 .');
// lo-rem-ipsum-do-or-sid-amet-10
```

You may optionally set the separator, a max length or decide to whether lower the case:

```php
Inflexible::slugify(
    'LoRem ipsum do|or sid amet||| #\`[|\" 10 .',
    array(
        'maxlength' => 4,
        'lowercase' => true,
        'separator' => '_'
    )
);
// lore
```

Run the test
------------

First make sure you have installed all the dependencies, run:

`$ composer install --dev`

then, run the test from within the root directory:

`$ phpunit`

Contributing
------------

1. Take a look at the [list of issues](http://github.com/borisguery/gisele/issues).
2. Fork
3. Write a test (for either new feature or bug)
4. Make a PR

Requirements
------------

* PHP 5.3+

Authors
-------

Boris Guéry - <guery.b@gmail.com> - <http://twitter.com/borisguery> - <http://borisguery.com>

License
-------

`Inflexible` is licensed under the WTFPL License - see the LICENSE file for details
