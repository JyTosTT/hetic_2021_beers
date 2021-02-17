<?php

namespace App\Twig;

use App\Entity\Client;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('average', [$this, 'average']),
            new TwigFilter('standardDeviation', [$this, 'standardDeviation']),
        ];
    }

    public function average($clients)
    {
        $numberBeer = 0;
        foreach ($clients as $client) {
            $numberBeer += $client->getNumberBeer();
        }
        return round($numberBeer / count($clients), 2);
    }

//    public function standardDeviation()
//    {
//        return '$price';
//    }
}