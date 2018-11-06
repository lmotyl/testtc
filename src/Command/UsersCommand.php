<?php
/**
 * Created by PhpStorm.
 * User: motyl
 * Date: 06.11.2018
 * Time: 23:36
 */

namespace App\Command;


use App\Entity\User;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UsersCommand extends ContainerAwareCommand
{

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('users:fruits')
            ->setDescription('Shows users with their plants.')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var UserService $userService */
        $userService = $this->getContainer()->get('app.service.user_service');

        $users = $userService->getUsers();

        foreach ($users as $user) {
            /** @var User $user */
            $userFruits = $user->getFruits();
            $userFruitsArray = [];
            foreach ($userFruits as $userFruit) {
                $userFruitsArray[] = $userFruit->getName();
            }
            $output->write(print_r([$user->getName(), $userFruitsArray] , 1));
        }
    }
}
