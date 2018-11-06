<?php
/**
 * Created by PhpStorm.
 * User: motyl
 * Date: 06.11.2018
 * Time: 21:11
 */

namespace App\Command;


use App\Interfaces\PlantInterface;
use App\Service\PlantService;
use App\Types\Fruit\AppleType;
use App\Types\Fruit\OrangeType;
use App\Types\Vegetable\CabbageType;
use App\Types\Vegetable\PotatoType;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ArrayCommand extends ContainerAwareCommand
{

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('array')
            ->setDescription('Array command to test tasks from Test Tc.')
        ;
    }



    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var PlantService $plantService */
        $plantService = $this->getContainer()->get('app.service.plant_service');
        $plants = $this->getPlants();
        $users = $this->getUsers();
        try {
            $this->setPlantsToUsers($plants, $users);
        } catch (\Exception $e) {
            $output->write( $e->getMessage());
            $output->write($e->getTraceAsString());
        }
        $output->write(print_r($plantService->checkArrayObjects($users), 1));
        uasort($users, [__CLASS__, 'comparePlants' ]);
        $this->removeByPlant($users, new AppleType());


        $output->write(print_r($plantService->checkArrayObjects($users), 1));
    }



    private function removeByPlant(&$users, PlantInterface $plant)
    {
        foreach ($users as $k => $userPlant)
        {
            /** @var PlantInterface $userPlant */
            if ($userPlant->getType() == $plant->getType()) {
                unset($users[$k]);
            }
        }
    }

    /**
     * @param $plants
     * @param $users
     * @throws \Exception
     */
    private function setPlantsToUsers($plants, &$users)
    {
        $plantsCount = count($plants) -1;
        foreach ($users as $k => $user) {
            $users[$k] = $plants[rand(0, $plantsCount)];
        }
    }

    static public function comparePlants($plantA, $plantB)
    {
        /** @var PlantInterface $plantA */
        /** @var PlantInterface $plantB */
        return strnatcasecmp($plantA->getType(), $plantB->getType());
    }

    private function getPlants()
    {
        $plants = [
            new CabbageType(),
            new PotatoType(),
            new AppleType(),
            new OrangeType()
        ];

        return $plants;
    }

    private function getUsers()
    {
        $users = [
           'Hamilton' => null,
           'Vettel' => null,
           'Raikonnen' => null,
           'Bottas'   => null,
           'Verstappen' => null
        ];

        return $users;
    }
}