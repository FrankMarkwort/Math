<?php
declare(strict_types=1);

namespace Math\Vector;

use Math\EnumRange;

/**
 *  Minus ist not testet
 */
class PolarVectorOperation
{
    public function __invoke(PolarVector $vector1, PolarVector $vector2, Operator $operator = Operator::PLUS, EnumRange $range = EnumRange::G360): PolarVector
    {
        $omega = $this->getOmega($vector1, $vector2, $operator);
        $r = $this->getR($vector1, $vector2, $operator);

        return (new PolarVector())->setOmega($omega)->setR($r);
    }

    private function getR(PolarVector $vector1, PolarVector $vector2, Operator $operator): float
    {
        $omega1 = $vector1->getOmega();
        $omega2 = $vector2->getOmega();
        $r1 = $vector1->getR();
        $r2 = $vector2->getR();
        $part1 = pow($r1,2) + pow($r2,2);
        $part2 = 2 * abs($r1) * abs($r2) * cos($omega1 - $omega2);
        if ($operator == Operator::PLUS) {
            $z = sqrt($part1 + $part2);
        } else {
            //TODO sqrt(-x )
            $z = sqrt($part1 - $part2);
        }

        return $z;
    }

    private function getOmega(PolarVector $vector1, PolarVector $vector2, Operator $operator): float
    {
        $omega1 = $vector1->getOmega();
        $omega2 = $vector2->getOmega();
        $r1 = $vector1->getR();
        $r2 = $vector2->getR();
        $yPart1 = abs($r1) * sin($omega1);
        $yPart2 = abs($r2) * sin($omega2);
        $xPart1 = abs($r1) * cos($omega1);
        $xPart2 = abs($r2) * cos($omega2);
        if ($operator == Operator::PLUS) {
             $y = $yPart1 + $yPart2;
             $x = $xPart1 + $xPart2;
        } else {
             $y = $yPart1 - $yPart2;
             $x = $xPart1 - $xPart2;
        }
        if ($x == 0 && $y == 0) {

            return 0;
        }

        return ($y < 0 )? atan2($y , $x) + 2 * pi() : atan2($y , $x);
    }
}