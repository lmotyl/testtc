<?php
/**
 * Created by PhpStorm.
 * User: motyl
 * Date: 06.11.2018
 * Time: 23:04
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="fruits")
 * @ORM\Entity(repositoryClass="App\Repository\FruitRepository")
 */

class Fruit
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
     * @var \Doctrine\Common\Collections\Collection|User[]
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="fruits")
     */
    private $users;

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
     * @return User[]|\Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }


}