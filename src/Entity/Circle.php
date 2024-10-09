<?php

namespace App\Entity;

use App\Repository\CircleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CircleRepository::class)
 */
class Circle
{
    function  calculateSurface($radius)
    {
        return floor(pi() * pow($radius, 2)*100)/100;
    }

    function calculateDiameter($radius)
    {
        return floor((2 * pi() * $radius)*100)/100;
    }
}
