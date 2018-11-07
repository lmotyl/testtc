<?php
/**
 * Created by PhpStorm.
 * User: motyl
 * Date: 07.11.2018
 * Time: 08:31
 */

namespace App\Service\Currency;


use App\Entity\Currency;
use App\Repository\CurrencyExchangeRateRepository;
use App\Repository\CurrencyRepository;
use App\Service\Currency\Providers\NbpApiProvider;
use Doctrine\ORM\EntityManagerInterface;

class UpdateCurrencyService
{

    protected $provider;

    protected $em;

    protected $currencyRepository;

    protected $currencyExchangeRateRepository;

    public function __construct(
        EntityManagerInterface $em,
        CurrencyRepository $currencyRepository,
        CurrencyExchangeRateRepository $currencyExchangeRateRepository
    ){
        $this->provider = new NbpApiProvider();
        $this->currencyRepository = $currencyRepository;
        $this->currencyExchangeRateRepository = $currencyExchangeRateRepository;
        $this->em = $em;
    }


    public function updateCurrencyList()
    {
        $list = $this->provider->getList();
        $effectiveDate = null;
        $rates = null;

        if ($list) {
            $effectiveDate = $list['effectiveDate'] ?? null;
            $rates = $list['rates'] ?? null;
        }

        if (!$rates) {
            return null;
        }

        foreach ($rates as $rate) {
            $code = $rate['code'] ?? null;
            $currencyRate = $rate['mid'];

            $currency = $this->currencyRepository->addCurrency($code);
            if ($currency) {
                $this->em->persist($currency);
            }

            $currencyExchangeRate = $this->currencyExchangeRateRepository->addCurrencyRate(
                $currency,
                $currencyRate,
                new \DateTime($effectiveDate)
            );

            if ($currencyExchangeRate) {
                $this->em->persist($currencyExchangeRate);
            }
        }

        $this->em->flush();

    }
}