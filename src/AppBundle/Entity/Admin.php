<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Admin
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\AdminRepository")
 */
class Admin implements UserInterface
{
    use GedmoTrait;

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
     * @ORM\Column(length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(length=255, nullable=true)
     */
    private $avatar;

    /**
     * @var string
     *
     * @ORM\Column(length=255, nullable=true)
     */
    private $middleName;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Project", mappedBy="confirmedBy", cascade={"persist"})
     */
    private $confirmedProjects;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    public function __construct()
    {
        $this->confirmedProjects = new ArrayCollection();
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
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @param string $middleName
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    public function __toString()
    {
       return $this->username;
    }

    /*------------------------------------------ relations methods----------------------------------------------------*/

    /**
     * Add confirmedProject
     *
     * @param Project $confirmedProject
     *
     * @return Admin
     */
    public function addConfirmedProject(Project $confirmedProject)
    {
        $this->confirmedProjects[] = $confirmedProject;

        return $this;
    }

    /**
     * Remove confirmedProject
     *
     * @param Project $confirmedProject
     */
    public function removeConfirmedProject(Project $confirmedProject)
    {
        $this->confirmedProjects->removeElement($confirmedProject);
    }

    /**
     * Get confirmedProjects
     *
     * @return Collection
     */
    public function getConfirmedProjects()
    {
        return $this->confirmedProjects;
    }

    /*--------------------------------implements methods--------------------------------------------------------------*/
    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        return ['ROLE_ADMIN'];
    }

    /**
     * {@inheritdoc}
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {}

    /**
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }
}
