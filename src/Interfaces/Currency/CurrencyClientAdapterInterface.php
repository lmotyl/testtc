<?php
/**
 * Created by PhpStorm.
 * User: motyl
 * Date: 07.11.2018
 * Time: 08:24
 */

namespace App\Interfaces\Currency;


interface CurrencyClientAdapterInterface
{
    public function request(string $url);
}