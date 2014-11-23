<?php

namespace LEA\EtuBundle\Distance;


class CalculDistance {

    // constructeur

    function __construct() {
    }

    function getProxyContext() {
        $aContext = array(
            'http' => array(
                'proxy' => 'tcp://cache-etu.univ-lille1.fr:3128',
                'request_fulluri' => true,
            ),
        );
        $cxContext = stream_context_create($aContext);

        return $cxContext;
    }

    // renvoi un lien avec un itinéraire google map de la cité scientifique a l'adresse en parametre
    function getLien($adresse) {
        $depart = "Cité Scientifique 59655 Villeneuve dAscq";
        $retour = "http://maps.google.com/maps?saddr=" . $depart . "&daddr=" . $adresse;
        return $retour;
    }

    // calcul la distance de la cité scientifique a l'adresse donnée en parametre
    function getDistance($adresse2) {

        if (isset($this->lieu[$adresse2])) {
            return $this->lieu[$adresse2];
        } else {
            if ($adresse2=="") return -1;
            time_nanosleep(0, 500000000);
            $adresse1 = "Cité+Scientifique+59655+Villeneuve%20d%20Ascq";
            //$adresse1 = str_replace(" ", "+", $adresse1);
            $adresse2 = str_replace(" ", "%20", $adresse2);
            $url = 'http://maps.google.com/maps/api/directions/xml?language=fr&origin=' . $adresse1 . '&destination=' . $adresse2 . '&sensor=false';
            error_log($url);
            //$xml = file_get_contents($url,false,  $this->getProxyContext());
            $xml = file_get_contents($url,false);
            $root = simplexml_load_string($xml);


            if ($root->status == "OK") {
                $distance = $root->route->leg->distance->value;
                $ladistance = intval($distance / 1000);
                $this->lieu[$adresse2] = $ladistance;
                /*if($ladistance==0){
                    $ladistance=-1;
                }*/
                error_log($root->status." -> ".$ladistance);
                return $ladistance;
            } else {
                error_log($root->status." -> -1");
                return -1;
            }
        }
    }

    // calcul la distance entre deux adresses en parametres
    function getDistance2($adresse1,$adresse2) {

        if (isset($this->lieu[$adresse2])) {
            return $this->lieu[$adresse2];
        } else {
            time_nanosleep(0, 500000000);

            $adresse1 = str_replace(" ", "+", $adresse1);
            $adresse2 = str_replace(" ", "+", $adresse2);
            $url = 'http://maps.google.com/maps/api/directions/xml?language=fr&origin=' . $adresse1 . '&destination=' . $adresse2 . '&sensor=false';
            $xml = file_get_contents($url,false,  getProxyContext());

            $root = simplexml_load_string($xml);

            if ($root->status == "OK") {
                $distance = $root->route->leg->distance->value;
                $ladistance = intval($distance / 1000);
                $this->lieu[$adresse2] = $ladistance;
                if($ladistance==0){
                    $ladistance=-1;
                }
                return $ladistance;
            } else {
                return -1;
            }
        }
    }


    /////////// ajout également dans queries.php pour les requetes ! et dans admin.php pour le lien
    //et pour le recalcul j'ai ajouter la page recalcul.php qui execute la fonction
    function recalculerDistance() {
        $instance = new calculDistance();

        $conn = doConnection();
        $res = doQueryDonneeDistance($conn);

        while ( $distances = mysql_fetch_row($res)) {
            // appliquer la fonction calcul a l'adresse
            //$d=$distances[1].' '.$distances[2];
            $d=$distances[2];
            echo "Recalculer distance pour $distances[0] situé à $d ...";

            $ladistance=  $instance->getDistance($d);
            echo $ladistance."km -> done <br/>\n";
            // reinserer dans la base
            if ($ladistance!=-1)
                doQueryInsertDistance($conn, $ladistance, $distances[0]);

        }

    }

}

?>