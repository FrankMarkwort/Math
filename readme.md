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
* return [length, angleInRad {range +- pi}] 
*/
$vectorArray180 = $polarVector->getVector(\Math\EnumRange::G180);
/**
* return [length, angleInRad {range:  2 * pi}] 
*/
$vectorArray360 = $polarVector->getVector(\Math\EnumRange::G360);

$getClone = false
$polarVector->rotate(2 * pi(), $getClone) 
/**
* same as 
*/
$polarVector->againstVector($getClone) 

$vector1 = (new Math\Vector\PolarVector())->setR(10)->setOmega(pi());
$vector2 = (new Math\Vector\PolarVector())->setR(20)->setOmega( pi() / 2 );
$vectorOperation = new Math\Vector\PolarVectorOperation()
$vector3 = $vectorOperation($vector1, $vector2, Math\Vector\Operator::PLUS, Math\EnumRange::G180);

# Bin
$int = Math\Bin\BinDec::bin2dec('101000101', false, 1);

```
