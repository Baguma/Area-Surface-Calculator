<?php

namespace App\Controller;

use App\Entity\Circle;
use App\Entity\Triangle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\GeormetryCalculator;

class CalculatorController extends AbstractController
{
    public function __construct(GeormetryCalculator $geormetryCalculator)
    {
        $this->geormetryCalculator = $geormetryCalculator;
    }

     /**
     * @Route("/calculator", name="app_calculator")
     */
    public function index(): Response
    {
        return $this->render('calculator/index.html.twig', [
            'controller_name' => 'CalculatorController',
        ]);
    }

    function circle(float $radius): JsonResponse
    {
        $circle =  new  Circle();
        $surfacearea = $circle->calculateSurface($radius);
        $circumference = $circle->calculateDiameter($radius);

        return $this->json([
            "type" => "circle",
            "radius" => $radius,
            "surface" => $surfacearea,
            "circumference" => $circumference
        ]);
    }

    function triangle(float $a, float $b, float $c): JsonResponse
    {
        $triangle = new Triangle();
        $area = $triangle->calculateSurface($a, $b, $c);
        $circumference = $triangle->calculateDiameter($a, $b, $c);

        return $this->json([
            "type" => "triangle",
            "a" => $a,
            "b" => $b,
            "c" => $c,
            "surface" => $area,
            "circumference" => $circumference,
        ]);
    }

    function sumArea(float $object1, float $object2) : JsonResponse
    {
        $calculator = $this->geormetryCalculator;
        $areasum = $calculator->sumAreaOfObjects($object1, $object2);
        return $this->json([
            "type" => "Sum of Area of 2 Objects",
            "sum" => $areasum,
        ]);

    }

    function sumDiameter(float $object1, float $object2) : JsonResponse
    {
        $calculator = $this->geormetryCalculator;
        $areasum = $calculator->sumDiameterOfObject($object1, $object2);
        return $this->json([
            "type" => "Sum of diameters of 2 Objects",
            "sum" => $areasum,
        ]);
    }
}
