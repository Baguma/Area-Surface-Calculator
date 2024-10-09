<?php

namespace App\Service;

class GeormetryCalculator
{
    function sumAreaOfObjects($object1, $object2)
    {
        $sum = ($object1 + $object2);

        return floor($sum*100)/100;
    }

    function sumDiameterOfObject($object1, $object2)
    {
        $sum = ($object1 + $object2);

        return floor($sum*100)/100;
    }
}