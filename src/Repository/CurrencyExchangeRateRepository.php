<?php
/**
 * Created by PhpStorm.
 * User: motyl
 * Date: 07.11.2018
 * Time: 07:58
 */

namespace App\Repository;


use App\Entity\CurrencyExchangeRate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CurrencyExchangeRateRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CurrencyExchangeRate::class);
    }

    public function addCurrencyRate($currency, $rate, \DateTime $created)
    {
        $exist = $this->findOneBy([
            'currency' => $currency,
            'created' => $created
        ]);

        $currencyExchangeRate = null;

        if (!$exist) {
            $currencyExchangeRate = new CurrencyExchangeRate(
                $currency,
                $rate,
                $created
            );

        }

        return $currencyExchangeRate;
    }

    /**
     * @param $code
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getNewestByCode($code)
    {
        return $this->createQueryBuilder('er')
            ->join('er.currency', 'c')
            ->where('c.code = :code')
            ->setParameter('code', $code)
            ->orderBy('er.created', 'DESC')
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param $code
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getAverage($code)
    {
        return $this->createQueryBuilder('er')
            ->select('avg(er.rate) as rate_avg')
            ->join('er.currency', 'c')
            ->where('c.code = :code')
            ->groupBy('c.code')
            ->setParameter('code', $code)
            ->getQuery()
            ->getOneOrNullResult();


    }

}