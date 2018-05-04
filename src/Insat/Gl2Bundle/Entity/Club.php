<?php

namespace Insat\Gl2Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Club
 *
 * @ORM\Table(name="club")
 * @ORM\Entity(repositoryClass="Insat\Gl2Bundle\Repository\ClubRepository")
 */
class Club
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
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\OneToOne(targetEntity="Insat\Gl2Bundle\Entity\Personne")
     */
    private $president;


    /**
     * @ORM\ManyToOne(targetEntity="Insat\Gl2Bundle\Entity\TypeClub")
     */
    private $typeClub;

    /**
     * @ORM\ManyToMany(targetEntity="Insat\Gl2Bundle\Entity\Event")
     */
    private $events;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Club
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set president
     *
     * @param \Insat\Gl2Bundle\Entity\Personne $president
     *
     * @return Club
     */
    public function setPresident(\Insat\Gl2Bundle\Entity\Personne $president = null)
    {
        $this->president = $president;

        return $this;
    }

    /**
     * Get president
     *
     * @return \Insat\Gl2Bundle\Entity\Personne
     */
    public function getPresident()
    {
        return $this->president;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->events = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set typeClub
     *
     * @param \Insat\Gl2Bundle\Entity\TypeClub $typeClub
     *
     * @return Club
     */
    public function setTypeClub(\Insat\Gl2Bundle\Entity\TypeClub $typeClub = null)
    {
        $this->typeClub = $typeClub;

        return $this;
    }

    /**
     * Get typeClub
     *
     * @return \Insat\Gl2Bundle\Entity\TypeClub
     */
    public function getTypeClub()
    {
        return $this->typeClub;
    }

    /**
     * Add event
     *
     * @param \Insat\Gl2Bundle\Entity\Event $event
     *
     * @return Club
     */
    public function addEvent(\Insat\Gl2Bundle\Entity\Event $event)
    {
        $this->events[] = $event;

        return $this;
    }

    /**
     * Remove event
     *
     * @param \Insat\Gl2Bundle\Entity\Event $event
     */
    public function removeEvent(\Insat\Gl2Bundle\Entity\Event $event)
    {
        $this->events->removeElement($event);
    }

    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvents()
    {
        return $this->events;
    }
}
