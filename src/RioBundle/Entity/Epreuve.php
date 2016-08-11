<?php

namespace RioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Epreuve
 *
 * @ORM\Table(name="epreuve")
 * @ORM\Entity(repositoryClass="RioBundle\Repository\EpreuveRepository")
 */
class Epreuve
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
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="RioBundle\Entity\Atlhete", mappedBy="epreuve")
     */
    private $atlhetes;

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
     * @return Epreuve
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
     * Set description
     *
     * @param string $description
     * @return Epreuve
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->atlhetes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add atlhetes
     *
     * @param \RioBundle\Entity\Atlhete $atlhetes
     * @return Epreuve
     */
    public function addAtlhete(\RioBundle\Entity\Atlhete $atlhetes)
    {
        $this->atlhetes[] = $atlhetes;

        return $this;
    }

    /**
     * Remove atlhetes
     *
     * @param \RioBundle\Entity\Atlhete $atlhetes
     */
    public function removeAtlhete(\RioBundle\Entity\Atlhete $atlhetes)
    {
        $this->atlhetes->removeElement($atlhetes);
    }

    /**
     * Get atlhetes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAtlhetes()
    {
        return $this->atlhetes;
    }
}
