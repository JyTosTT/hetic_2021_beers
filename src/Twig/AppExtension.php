<?php

namespace App\Twig;

use App\Entity\Client;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('average', [$this, 'getAverageBeersBought']),
            new TwigFilter('standardDeviation', [$this, 'standardDeviation']),
        ];
    }

    public function getAverageBeersBought($clients): float
    {
        $numberBeerTotal = $this->getTotalBeersBought($clients);

        return round($numberBeerTotal / count($clients), 2);
    }


    public function getTotalBeersBought($clients): int
    {
        $numberBeer = 0;
        foreach ($clients as $client) {
            $numberBeer += $client->getNumberBeer();
        }
        return $numberBeer;
    }


    public function standardDeviation($clients): float
    {
        $averageBeersBought = $this->getAverageBeersBought($clients);
        $nbOfClients = count($clients);
        $sum = 0;

        foreach ($clients as $client) {
            $numberOfBeersBoughtByClient = $client->getNumberBeer();
            $sum += ($numberOfBeersBoughtByClient - $averageBeersBought) ** 2;
        }

        return round(sqrt($sum / $nbOfClients), 2);
    }
}
