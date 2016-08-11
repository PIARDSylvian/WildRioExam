<?php

namespace RioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Atlhete
 *
 * @ORM\Table(name="atlhete")
 * @ORM\Entity(repositoryClass="RioBundle\Repository\AtlheteRepository")
 */
class Atlhete
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="RioBundle\Entity\Epreuve", inversedBy="atlhetes")
     * 
     */
    private $epreuve;

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
     * Set name
     *
     * @param string $name
     * @return Atlhete
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set epreuve
     *
     * @param \RioBundle\Entity\Epreuve $epreuve
     * @return Atlhete
     */
    public function setEpreuve(\RioBundle\Entity\Epreuve $epreuve)
    {
        $this->epreuve = $epreuve;

        return $this;
    }

    /**
     * Get epreuve
     *
     * @return \RioBundle\Entity\Epreuve 
     */
    public function getEpreuve()
    {
        return $this->epreuve;
    }
}
