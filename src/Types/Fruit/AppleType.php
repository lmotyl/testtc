<?php
/**
 * Created by PhpStorm.
 * User: motyl
 * Date: 06.11.2018
 * Time: 15:14
 */

namespace App\Types\Fruit;


class AppleType extends FruitTypeAbstract
{
    public function __construct() {
        $this->type = 'Apple';
    }
}