<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ParamController extends Controller
{
    /**
     * @Route("/hello/{name}", name="parampage")
     */
    public function helloAction($name)
    {
        return $this->render('param/name.html.twig', [
            'greeting' => 'Hello world :)',
            'name' => $name
        ]);
    }
}
