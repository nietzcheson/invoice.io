<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorias
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Categorias
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
     * @ORM\Column(name="categoria", type="string", length=255)
     */
    private $categoria;

    /**
     * @ORM\ManyToOne(targetEntity="TiposRegistro", inversedBy="categorias")
     * @ORM\JoinColumn(name="tipo_registro_id", referencedColumnName="id")
     */

    private $tiposRegistro;

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
     * Set categoria
     *
     * @param string $categoria
     * @return Categorias
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return string
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set tiposRegistro
     *
     * @param \AppBundle\Entity\TiposRegistro $tiposRegistro
     * @return Categorias
     */
    public function setTiposRegistro(\AppBundle\Entity\TiposRegistro $tiposRegistro = null)
    {
        $this->tiposRegistro = $tiposRegistro;

        return $this;
    }

    /**
     * Get tiposRegistro
     *
     * @return \AppBundle\Entity\TiposRegistro 
     */
    public function getTiposRegistro()
    {
        return $this->tiposRegistro;
    }
}
