<?php
/**
 * Created by PhpStorm.
 * User: motyl
 * Date: 07.11.2018
 * Time: 08:08
 */

namespace App\Service\Currency\Providers;


use App\Interfaces\Currency\CurrencyAdapterInterface;
use App\Service\Currency\Providers\NbpClient\NbpJsonApiClient;

class NbpApiProvider implements CurrencyAdapterInterface
{
    protected $urlGetList = 'http://api.nbp.pl/api/exchangerates/tables/a/';

    protected $urlGetExchangeRate = 'http://api.nbp.pl/api/exchangerates/rates/a/{currencyCode}/';

    protected $client;

    public function __construct()
    {
        $this->client = new NbpJsonApiClient();
    }

    public function getList()
    {
        $result = $this->client->request($this->urlGetList);
        if ($result) {
            $result = $result[0] ?? null;
        }

        return $result;
    }

    public function getExchangeRate(string $code): string
    {
        // TODO: Implement getExchangeRate() method.
    }


}