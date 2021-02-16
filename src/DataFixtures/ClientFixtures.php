<?php

namespace App\DataFixtures;

use Doctrine\Persistence\ObjectManager;

use App\Entity\Client;

class ClientFixtures extends BaseFixture
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(Client::class, 25, function (Client $client) {
            $client->setEmail($this->faker->email());
            $client->setAge(random_int(18, 75));
            $client->setNumberBeer(random_int(1, 400));
        });

        $manager->flush();
    }
}