<?php
/**
 * Created by PhpStorm.
 * User: motyl
 * Date: 06.11.2018
 * Time: 15:16
 */

namespace App\Types\Fruit;


class OrangeType extends FruitTypeAbstract
{
    public function __construct()
    {
        $this->type = 'Orange';
    }

    static public function make()
    {
        return 'orange juice';
    }

}