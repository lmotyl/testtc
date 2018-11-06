<?php
/**
 * Created by PhpStorm.
 * User: motyl
 * Date: 06.11.2018
 * Time: 15:24
 */

namespace App\Service;


use App\Interfaces\PlantInterface;

class PlantService
{

    /**
     * @param PlantInterface $obj
     * @return string
     */
    function checkObject (PlantInterface $obj)
    {
        return $obj->getType();
    }

    /**
     * @param array $objects
     * @return array
     */
    function checkArrayObjects(array $objects)
    {
        $out = [];
        foreach ($objects as $k => $object)
        {
            if ($object instanceof PlantInterface) {
                $out[$k] = $object->getType();
            }
        }
        return $out;
    }
}