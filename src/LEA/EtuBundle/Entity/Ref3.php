<?php

namespace LEA\EtuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ref3
 *
 * @ORM\Table(name="ref3")
 * @ORM\Entity
 */
class Ref3
{
    /**
     * @var string
     *
     * @ORM\Column(name="bref", type="string", length=200, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $bref;

    /**
     * @var string
     *
     * @ORM\Column(name="rcle", type="string", length=200, nullable=false)
     */
    private $rcle;



    /**
     * Get bref
     *
     * @return string 
     */
    public function getBref()
    {
        return $this->bref;
    }

    /**
     * Set rcle
     *
     * @param string $rcle
     * @return Ref3
     */
    public function setRcle($rcle)
    {
        $this->rcle = $rcle;

        return $this;
    }

    /**
     * Get rcle
     *
     * @return string 
     */
    public function getRcle()
    {
        return $this->rcle;
    }
}
