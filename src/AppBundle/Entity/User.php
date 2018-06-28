<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 *
 */
class User implements UserInterface, \Serializable
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
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=45, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="nickName", type="string", length=45)
     */
    private $nickName;



    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(name= "profilePic", type="string", nullable=true, length=500,  )
     */
    private $profilePic;

    /**
     * @Assert\Image(
     *     mimeTypes={"image/jpeg", "image/png", "image/gif", "image/jpg"},
     *     mimeTypesMessage= " Merci de choisir une image  .jpeg ou .png")
     */
    private $profilePicFile;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     */
    private $newPassword;

    /**
     *
     * @Assert\Length(max=4096)
     */
    private $plainPassword;


    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", nullable=true, unique=true)
     */
    private $token;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", nullable=true)
     */
    private $role;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Formation", cascade={"persist"})
     */
    private $favoriteFormations;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User", cascade={"persist"})
     */
    private $favoriteFormateurs;

    public function __construct()
    {
        $this->favoriteFormations = new ArrayCollection();
        $this->favoriteFormateurs = new ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return User
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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * @param string $nickName
     */
    public function setNickName($nickName)
    {
        $this->nickName = $nickName;
    }


    /**
     * Get nickname
     * @internal
     * @return string
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param mixed $plainPassword
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }

    /**
     * @return mixed
     */
    public function getFavoriteFormations()
    {
        return $this->favoriteFormations;
    }

    /**
     * @param mixed $favoriteFormations
     */
    public function setFavoriteFormations($favoriteFormations)
    {
        $this->favoriteFormations = $favoriteFormations;
    }

    /**
     * @param mixed $favoriteFormation
     */
    public function addFavoriteFormation($favoriteFormation)
    {
        $this->favoriteFormations[] = $favoriteFormation;
    }
    public function removeFavoriteFormation($favoriteFormation)
    {
        $this->favoriteFormations->removeElement($favoriteFormation);
    }

    public function isFormationFavorited(Formation $formation)
    {
        return $this->favoriteFormations->contains($formation);
    }

    /**
     * @return mixed
     */
    public function getFavoriteFormateurs()
    {
        return $this->favoriteFormateurs;
    }

    /**
     * @param mixed $favoriteFormateurs
     */
    public function setFavoriteFormateurs($favoriteFormateurs)
    {
        $this->favoriteFormateurs = $favoriteFormateurs;
    }
    /**
     * @param mixed $favoriteFormateur
     */
    public function addFavoriteFormateur($favoriteFormateur)
    {
        $this->favoriteFormateurs[] = $favoriteFormateur;
    }
    public function removeFavoriteFormateur($favoriteFormateur)
    {
        $this->favoriteFormateurs->removeElement($favoriteFormateur);
    }

    public function isFormateurFavorited(User $formateur)
    {
        return $this->favoriteFormateurs->contains($formateur);
    }


    public function getRoles()
    {
        if (!$this->role) {
            return ['ROLE_USER'];
        }

        return [$this->role];
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->email,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->email,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized, ['allowed_classes' => false]);
    }

    /**
     *@return string
     */
    public function getProfilePic()
    {
        return $this->profilePic;
    }

    /**
     * @param mixed $profilePic
     */
    public function setProfilePic($profilePic)
    {
        $this->profilePic = $profilePic;
    }

    /**
     * @return mixed | UploadedFile
     */
    public function getProfilePicFile()
    {
        return $this->profilePicFile;
    }

    /**
     * @param mixed $profilePicFile
     */
    public function setProfilePicFile($profilePicFile)
    {
        $this->profilePicFile = $profilePicFile;
    }

    /**
     * @return mixed
     */
    public function getNewPassword()
    {
        return $this->newPassword;
    }

    /**
     * @param string $newPassword
     */
    public function setNewPassword(string $newPassword)
    {
        $this->newPassword = $newPassword;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    public function __toString()
    {
        return $this->name;
    }







}

