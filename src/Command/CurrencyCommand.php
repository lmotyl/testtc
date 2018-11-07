<?php
/**
 * Created by PhpStorm.
 * User: motyl
 * Date: 07.11.2018
 * Time: 08:05
 */

namespace App\Command;


use App\Service\Currency\UpdateCurrencyService;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CurrencyCommand extends ContainerAwareCommand
{

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('currency')
            ->setDescription('Handle updating currencies and exchange rates table.')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var UpdateCurrencyService $updateCurrencyService */
        $updateCurrencyService = $this->getContainer()->get('app.service.currency.update_currency_service');
        $updateCurrencyService->updateCurrencyList();
    }
}
