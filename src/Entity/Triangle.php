<?php

namespace App\Entity;

use App\Repository\TriangleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TriangleRepository::class)
 */
class Triangle
{
    function  calculateSurface($a, $b, $c)
    {
        $perimeter = ($a + $b + $c)/2;
        $area =  sqrt($perimeter * ($perimeter - $a) * ($perimeter - $b) * ($perimeter - $c));

        return floor($area * 100) /100;
    }

    function calculateDiameter($a, $b, $c)
    {
        return ($a + $b + $c);
    }
}
