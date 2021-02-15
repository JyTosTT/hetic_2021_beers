<?php

namespace App\DataFixtures;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Beer;
use App\Entity\Country;

class BeerFixtures extends BaseFixture implements DependentFixtureInterface
{
  private static $beerNames = [
    'beer super',
    'beer cool',
    'beer strange',
    'beer very bad trip',
    'beer super strange',
    'beer very sweet',
    'beer hyper cool',
    'beer without alcool',
    'beer simple',
    'beer very simple',
  ];

  public function loadData(ObjectManager $manager)
  {
    $this->createMany(Beer::class, 20, function (Beer $beer) {
      $beer->setName($this->faker->randomElement(self::$beerNames));

      $beer->setDescription($this->faker->realText());

      $beer->setPrice($this->faker->randomFloat(1, 4, 10.5));

      $beer->setPublishedAt($this->faker->dateTime());

      $beer->setCountry($this->getRandomReference(Country::class));

      $beer->setDegree($this->faker->randomFloat(1, 3.4, 10.7));
    });

    $manager->flush();
  }

  public function getDependencies()
  {
    return [CountryFixtures::class, CategoryFixtures::class];
  }
}
