<?php
/**
 * Created by PhpStorm.
 * User: motyl
 * Date: 07.11.2018
 * Time: 08:02
 */

namespace App\Interfaces\Currency;


interface CurrencyAdapterInterface
{
    public function getList();

    public function getExchangeRate(string $code):string;

}