<?php
/**
 * Created by PhpStorm.
 * User: motyl
 * Date: 07.11.2018
 * Time: 08:22
 */

namespace App\Service\Currency\Providers\NbpClient;


use App\Interfaces\Currency\CurrencyClientAdapterInterface;

class NbpJsonApiClient implements CurrencyClientAdapterInterface
{

    public function request(string $url)
    {
        //  Initiate curl
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $result = curl_exec($ch);
        curl_close($ch);



        return json_decode($result, true);
    }


}