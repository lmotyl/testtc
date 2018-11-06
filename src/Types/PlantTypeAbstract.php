<?php
/**
 * Created by PhpStorm.
 * User: motyl
 * Date: 06.11.2018
 * Time: 15:05
 */

namespace App\Types;


use App\Interfaces\PlantInterface;

abstract class PlantTypeAbstract implements PlantInterface
{
    protected $type = 'Other';

    public function getType(): string
    {
        return $this->type;
    }
}