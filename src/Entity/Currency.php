<?php
/**
 * Created by PhpStorm.
 * User: motyl
 * Date: 07.11.2018
 * Time: 07:37
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="currencies")
 * @ORM\Entity(repositoryClass="App\Repository\CurrencyRepository")
 */
class Currency
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
    private $code;

    /**
     * @var \Doctrine\Common\Collections\Collection|CurrencyExchangeRate[]

     * @ORM\OneToMany(targetEntity="CurrencyExchangeRate", mappedBy="currency")
     */
    private $exchangeRates;

    public function __construct(
        string $code
    )
    {
        $this->code = $code;
        $this->exchangeRates = new ArrayCollection();
    }

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
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param CurrencyExchangeRate[]|\Doctrine\Common\Collections\Collection $exchangeRates
     */
    public function setExchangeRates($exchangeRates): void
    {
        $this->exchangeRates = $exchangeRates;
    }
}