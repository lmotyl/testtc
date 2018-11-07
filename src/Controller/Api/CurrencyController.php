<?php
/**
 * Created by PhpStorm.
 * User: motyl
 * Date: 07.11.2018
 * Time: 07:32
 */

namespace App\Controller\Api;


use App\Entity\Currency;
use App\Entity\CurrencyExchangeRate;
use App\Repository\CurrencyExchangeRateRepository;
use App\Repository\CurrencyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CurrencyController extends Controller
{

    protected $currencyRepository;

    protected $currencyExchangeRateRepository;

    public function __construct(
        CurrencyRepository $currencyRepository,
        CurrencyExchangeRateRepository $currencyExchangeRateRepository
    )
    {
        $this->currencyRepository = $currencyRepository;
        $this->currencyExchangeRateRepository = $currencyExchangeRateRepository;
    }

    /**
     * @param Request $request
     * @Route("/api/currency/list")
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     *
     */
    public function listAction(Request $request)
    {
        $currencies = $this->currencyRepository->findAll();
        $out = [
            'currencies' => []
        ];
        foreach ($currencies as $currency) {
            /** @var Currency $currency */
            $out['currencies'][] = ['code' => $currency->getCode()];
        }

        return $this->json($out);
    }

    /**
     * @param Request $request
     * @Route("/api/currency/get")
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     *
     */
    public function getAction(Request $request)
    {
        $requestCode = $request->get('code');
        $out = [];
        try {
            $currencyExchangeRate = $this->currencyExchangeRateRepository->getNewestByCode($requestCode);
            if($currencyExchangeRate) {
                $out = [
                    'code' => $requestCode,
                    'rate' => $currencyExchangeRate->getRate()
                ];
            }
        } catch (\Exception $e) {
            $out = [ 'error' => $e->getMessage()];
        }


        return $this->json($out);
    }

    /**
     * @param Request $request
     * @Route("/api/currency/average")
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     *
     */
    public function averageAction(Request $request)
    {
        $requestCode = $request->get('code');
        $out = [];
        try {
            $averageRate = $this->currencyExchangeRateRepository->getAverage($requestCode);
            if($averageRate) {
                $out = [
                    'code' => $requestCode,
                    'rate' => $averageRate['rate_avg']
                ];
            }
        } catch (\Exception $e) {
            $out = [ 'error' => $e->getMessage()];
        }


        return $this->json($out);
    }

}