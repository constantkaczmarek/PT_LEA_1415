<?php

namespace LEA\EtuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RencontreController extends Controller
{

    public function indexAction($name)
    {
        $conn = $this->get('database_connection');

        $queryEtu = $this->get('queries_etu');
        $altRef = $queryEtu->doGetAltRefForStudent($conn,$name);

        $query = $this->get('queries_etapes');
        $infos = $query->getRencontreTuteur($conn,$altRef);

        if ($infos[3] == null) {

            $infoExist = false;
            return $this->render('LEAEtuBundle:Default:rencontreTuteur.html.twig', array(
                'name'      => $name,
                'infoExist' => $infoExist,
            ));

        } else {

            $infoExist = true;
            $altCle = $infos[0];
            $et_pn = $infos[1] . " " . $infos[2];
            $date = $infos[3] == "0000-00-00" ? "" : $infos[3];
            $entr = $infos[4];
            $serv = $infos[5];
            $client = $infos[6];

            $html = $this->get('html_utils');

            $missions = $html->toMinimumLines($html->toHtml($infos[7]), 0);
            $env = $html->toMinimumLines($html->toHtml($infos[8]), 0);
            $integration = $html->toMinimumLines($html->toHtml($infos[9]), 0);

            $signEtud = $infos[10];
            $rmqEtud = $html->toMinimumLines($html->toHtml($infos[11]), 0);

            $signTut = $infos[12] != 0 ? "OUI" : "NON";
            $rmqTut = $html->toMinimumLines($html->toHtml($infos[13]), 0);

            return $this->render('LEAEtuBundle:Default:rencontreTuteur.html.twig', array(
                'name'      => $name,
                'infoExist' => $infoExist,
                'name'      => $name,
                'altCle'    => $altCle,
                'et_pn'     => $et_pn,
                'date'      => $date,
                'entr'      => $entr,
                'serv'      => $serv,
                'client'    => $client,
                'missions'  => $missions,
                'env'       => $env,
                'integration'   => $integration,
                'signEtud'  => $signEtud,
                'rmqEtud'   => $rmqEtud,
                'signTut'   => $signTut,
                'rmqTut'    => $rmqTut,
            ));
        }
    }

}

