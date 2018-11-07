<?php
/**
 * Created by PhpStorm.
 * User: motyl
 * Date: 07.11.2018
 * Time: 07:38
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="currency_exchange_rates")
 * @ORM\Entity(repositoryClass="App\Repository\CurrencyExchangeRateRepository")
 */
class CurrencyExchangeRate
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Currency
     * @ORM\ManyToOne(targetEntity="Currency", inversedBy="exchangeRates")
     * @ORM\JoinColumn(name="currency_id", referencedColumnName="id")
     */
    private $currency;

    /**
     * @var float
     * @ORM\Column(type="float")
     */
    private $rate;
    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $created;

    public function __construct(
        Currency $currency,
        $rate,
        \DateTime $created
    )
    {
        $this->currency = $currency;
        $this->rate = $rate;
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    /**
     * @return \DateTime
     */
    public function getCreated(): \DateTime
    {
        return $this->created;
    }

    /**
     * @param Currency $currency
     */
    public function setCurrency(Currency $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @param \DateTime $created
     */
    public function setCreated(\DateTime $created): void
    {
        $this->created = $created;
    }

    /**
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }


}