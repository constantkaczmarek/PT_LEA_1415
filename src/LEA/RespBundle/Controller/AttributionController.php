<?php

namespace LEA\RespBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class AttributionController extends Controller
{
    public function indexAction()
    {
        $session =$this->getRequest()->getSession();
        $name = $session->get('name');
        $role = $session->get('role');

        return $this->render('LEARespBundle:Default:attribution.html.twig', array('name' => $name));
    }
}
