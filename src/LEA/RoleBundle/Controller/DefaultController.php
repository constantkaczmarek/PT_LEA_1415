<?php

namespace LEA\RoleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('RoleBundle:Default:index.html.twig', array('name' => $name));
    }
}
