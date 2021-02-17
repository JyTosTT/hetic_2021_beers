<?php

namespace App\DataFixtures;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use App\Entity\Statistic;
use App\Entity\Client;
use App\Entity\Beer;

class StatisticFixtures extends BaseFixtures implements DependentFixtureInterface
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(Statistic::class, 15, function (Statistic $statistic) {
            $statistic->setScore(random_int(0, 100));
            $statistic->setClient($this->getRandomReference(Client::class));
            $statistic->setBeer($this->getRandomReference(Beer::class));
        });

        $manager->flush();
    }

    public function getDependencies()
    {
        return [ClientFixtures::class, BeerFixtures::class];
    }
}
