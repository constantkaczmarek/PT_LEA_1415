<?php

namespace LEA\RespBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $name="bilasco";
        $session = new Session();
        $session->start();

        $session->set('role',"resp");
        $session->set('name',$name);

        return $this->render('LEARespBundle:Default:index.html.twig', array('name' => $name));
    }
}
