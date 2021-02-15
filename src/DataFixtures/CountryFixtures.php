<?php

namespace App\DataFixtures;

use Doctrine\Persistence\ObjectManager;
use App\Entity\Country;

class CountryFixtures extends BaseFixture
{

  public function loadData(ObjectManager $manager)
  {
    $this->createMany(Country::class, 8, function (Country $country, $count) {
      $country->setName($this->faker->country());
    });

    $manager->flush();
  }
}
