<?php

namespace RioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vote
 *
 * @ORM\Table(name="vote")
 * @ORM\Entity(repositoryClass="RioBundle\Repository\VoteRepository")
 */
class Vote
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
     * @var int
     *
     * @ORM\Column(name="id_epreuve", type="integer")
     */
    private $idEpreuve;

    /**
     * @var int
     *
     * @ORM\Column(name="id_athlete", type="integer")
     */
    private $idAthlete;

    /**
     * @var int
     *
     * @ORM\Column(name="score", type="integer")
     */
    private $score;


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
     * Set idEpreuve
     *
     * @param integer $idEpreuve
     * @return Vote
     */
    public function setIdEpreuve($idEpreuve)
    {
        $this->idEpreuve = $idEpreuve;

        return $this;
    }

    /**
     * Get idEpreuve
     *
     * @return integer 
     */
    public function getIdEpreuve()
    {
        return $this->idEpreuve;
    }

    /**
     * Set idAthlete
     *
     * @param integer $idAthlete
     * @return Vote
     */
    public function setIdAthlete($idAthlete)
    {
        $this->idAthlete = $idAthlete;

        return $this;
    }

    /**
     * Get idAthlete
     *
     * @return integer 
     */
    public function getIdAthlete()
    {
        return $this->idAthlete;
    }

    /**
     * Set score
     *
     * @param integer $score
     * @return Vote
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer 
     */
    public function getScore()
    {
        return $this->score;
    }
}
