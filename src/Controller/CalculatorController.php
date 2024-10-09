<?php

namespace App\Controller;

use App\Entity\Circle;
use App\Entity\Triangle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
     /**
     * @Route("/calculator", name="app_calculator")
     */
    public function index(): Response
    {
        return $this->render('calculator/index.html.twig', [
            'controller_name' => 'CalculatorController',
        ]);
    }

    public function circle(float $radius): JsonResponse
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

    public function triangle(float $a, float $b, float $c): JsonResponse
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
}
