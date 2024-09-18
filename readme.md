# math

## Getting started

### Instalation

```
composer require poseidon2/math
```

### Usage

```php
<?php
$polarVector = new \Math\Vector\PolarVector();
$length = 10;
$angleRad = 3.14;
$polarVector->setR($length)->getOmega($angleRad);
/**
* return [length, angleInRad +- pi] 
*/
$vectorArray180 = $polarVector->getVector(\Math\EnumRange::G180);
/**
* return [length, angleInRad + 2 * pi] 
*/
$vectorArray360 = $polarVector->getVector(\Math\EnumRange::G360);

$polarVector->rotate(2 * pi()) 

```
