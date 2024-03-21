<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    /**
     * @Route("/{reactRouting}", name="home", requirements={"reactRouting"="^(?!api).+"})
     */
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }
}