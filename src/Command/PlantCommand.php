<?php
/**
 * Created by PhpStorm.
 * User: lmotyl
 * Date: 19.01.18
 * Time: 10:42
 */

namespace App\Command;

use App\Service\PlantService;
use App\Types\Fruit\AppleType;
use App\Types\Fruit\OrangeType;
use App\Types\Vegetable\CabbageType;
use App\Types\Vegetable\PotatoType;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PlantCommand extends ContainerAwareCommand
{

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('plant')
            ->setDescription('Plant command to test tasks from Test Tc.')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            /** @var PlantService $plantService */
            $plantService = $this->getContainer()->get('app.service.plant_service');
            $cabbageType = new CabbageType();
            $potatoType = new PotatoType();
            $appleType = new AppleType();
            echo $cabbageType->getType().PHP_EOL;
            echo $potatoType->getType().PHP_EOL;
            echo $appleType->getType().PHP_EOL;

            print_r([
                $plantService->checkObject($appleType),
                $plantService->checkObject($cabbageType),
                $plantService->checkObject($potatoType)
            ]);

            print_r(OrangeType::make());
            echo PHP_EOL;


        } catch (\Exception $e) {
            $output->writeln($e->getMessage());
        }
    }
}
