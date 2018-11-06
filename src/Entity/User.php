<?php
/**
 * Created by PhpStorm.
 * User: motyl
 * Date: 06.11.2018
 * Time: 22:39
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $name;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", length=64)
     */
    private $added;

    /**
     * @var \Doctrine\Common\Collections\Collection|Fruit[]
     *
     * @ORM\ManyToMany(targetEntity="Fruit", inversedBy="users")
     * @ORM\JoinTable(
     *  name="users_fruits",
     *  joinColumns={
     *      @ORM\JoinColumn(name="fruit_id", referencedColumnName="id")
     *  },
     *  inverseJoinColumns={
     *      @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *  }
     * )
     */
    private $fruits;
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return \DateTime
     */
    public function getAdded(): \DateTime
    {
        return $this->added;
    }

    /**
     * @param \DateTime $added
     */
    public function setAdded(\DateTime $added): void
    {
        $this->added = $added;
    }

    /**
     * @return Fruit[]|\Doctrine\Common\Collections\Collection
     */
    public function getFruits()
    {
        return $this->fruits;
    }


}