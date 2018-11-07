<?php
/**
 * Created by PhpStorm.
 * User: motyl
 * Date: 07.11.2018
 * Time: 07:58
 */

namespace App\Repository;


use App\Entity\Currency;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CurrencyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Currency::class);
    }


    public function addCurrency($code)
    {
        $currency = $this->findOneBy(['code' => $code]);

        if (!$currency) {
            $currency = new Currency($code);

        }

        return $currency;
    }
}