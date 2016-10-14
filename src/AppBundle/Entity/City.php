<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints as AssertBridge;

/**
 * City
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\CityRepository")
 * @AssertBridge\UniqueEntity(
 *     fields="city",
 *     errorPath="not valid",
 *     message="The city is already in use."
 * )
 */
class City
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;
    
    /**
     * @var VoteSettings[]ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="VoteSettings", mappedBy="location", cascade={"persist"})
     */
    private $voteSetting;
    
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->city;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->voteSetting = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set city
     *
     * @param string $city
     *
     * @return City
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Add voteSetting
     *
     * @param \AppBundle\Entity\VoteSettings $voteSetting
     *
     * @return City
     */
    public function addVoteSetting(\AppBundle\Entity\VoteSettings $voteSetting)
    {
        $this->voteSetting[] = $voteSetting;

        return $this;
    }

    /**
     * Remove voteSetting
     *
     * @param \AppBundle\Entity\VoteSettings $voteSetting
     */
    public function removeVoteSetting(\AppBundle\Entity\VoteSettings $voteSetting)
    {
        $this->voteSetting->removeElement($voteSetting);
    }

    /**
     * Get voteSetting
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVoteSetting()
    {
        return $this->voteSetting;
    }
}
