<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TiposRegistro
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TiposRegistro
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoRegistro", type="string", length=255)
     */
    private $tipoRegistro;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tipoRegistro
     *
     * @param string $tipoRegistro
     * @return TiposRegistro
     */
    public function setTipoRegistro($tipoRegistro)
    {
        $this->tipoRegistro = $tipoRegistro;

        return $this;
    }

    /**
     * Get tipoRegistro
     *
     * @return string 
     */
    public function getTipoRegistro()
    {
        return $this->tipoRegistro;
    }
}
