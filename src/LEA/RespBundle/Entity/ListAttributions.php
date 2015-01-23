<?php

namespace LEA\RespBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class ListAttributions
{

    protected $attributions;

   /* public function __construct()
    {
        //$this->attributions = new ArrayCollection();
    }*/


    public function getAttributions()
    {
        return $this->attributions;
    }

    /*public function addAttribution(array $attributions){
        $this->attributions->add($attributions);
    }
*/
    public function setAttributions(array $attributions)
    {
        $this->attributions = $attributions;
    }

}