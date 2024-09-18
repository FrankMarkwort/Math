<?php
declare(strict_types=1);

namespace Math\Skalar;

use Math\AbstractAngleRad;
use Math\EnumRange;
use Math\MathException;

class Rad extends AbstractAngleRad
{
   public function getDegOmega(EnumRange $range = EnumRange::G360): float
    {
        return rad2deg($this->getOmega($range));
    }

    /**
     * @throws MathException
     */
    public function rotate(float $rad): Rad
    {
        throw new MathException('Rad::rotate is not implemented');
    }
}
