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
            new TwigFilter('average', [$this, 'getAverageAndBeerTotal']),
            new TwigFilter('standardDeviation', [$this, 'standardDeviation']),
        ];
    }

    public function getAverageAndBeerTotal($clients): array
    {
        $numberBeerTotal = $this->getNumberBeerTotal($clients);
        return [
            'beerTotal' => $numberBeerTotal,
            'average' => round($numberBeerTotal / count($clients), 2)

        ];
    }


    public function getNumberBeerTotal($clients): int
    {
        $numberBeer = 0;
        foreach ($clients as $client) {
            $numberBeer += $client->getNumberBeer();
        }
        return $numberBeer;
    }


    public function standardDeviation($clients)
    {
        $data = $this->getAverageAndBeerTotal($clients);
        $sum = 0;
        return $data['beerTotal'];
    }
}