# create-matrix
[![Travis CI](https://img.shields.io/travis/petrgrishin/create-matrix/master.svg?style=flat-square)](https://travis-ci.org/petrgrishin/create-matrix)

Helper for create matrix

## Installation
Add a dependency to your project's composer.json file if you use [Composer](http://getcomposer.org/) to manage the dependencies of your project:
```json
{
    "require": {
        "petrgrishin/create-matrix": "~1.0"
    }
}
```

## Usage examples
#### Create matrix by the variants
```php
$variants = [
    'a' => [1, 2],
    'b' => [10, 20],
];
$matrix = CreateMatrix::byVariants($variants)->getArray();

// result
$matrix = Array
(
    [0] => Array
        (
            [a] => 1
            [b] => 10
        )

    [1] => Array
        (
            [a] => 1
            [b] => 20
        )

    [2] => Array
        (
            [a] => 2
            [b] => 10
        )

    [3] => Array
        (
            [a] => 2
            [b] => 20
        )

)
```

#### Create matrix with variant an empty value

```php
$variants = [
    'a' => [1, null],
    'b' => [10, null],
];
$matrix = CreateMatrix::byVariants($variants)->getArray();

// result
$matrix = Array
(
    [0] => Array
        (
            [a] => 1
            [b] => 10
        )

    [1] => Array
        (
            [a] => 1
            [b] => 
        )

    [2] => Array
        (
            [a] => 
            [b] => 10
        )

    [3] => Array
        (
            [a] => 
            [b] => 
        )

)
```
