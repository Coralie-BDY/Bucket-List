<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render("main/home.html.twig");
    }
    /**
     * @Route("/about-us", name="about_us")
     */
    public function aboutUs()
    {
        return $this->render("main/about-us.html.twig");
    }
}
