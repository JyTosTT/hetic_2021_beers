<?php

namespace App\DataFixtures;

use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;

class CategoryFixtures extends BaseFixture
{

  private static $normalCategories = ['blonde', 'brune', 'blanche'];
  private static $specialCategories =
  ['houblon', 'rose', 'menthe', 'grenadine', 'réglisse', 'marron', 'whisky', 'bio'];

  public function loadData(ObjectManager $manager)
  {

    foreach (self::$normalCategories as $key => $normalCategory) {
      $category = new Category();
      $this->setCategoryData($category, $normalCategory, "normal");
      $manager->persist($category);
      // store for usage later as App\Entity\ClassName_#COUNT#
      $this->addReference(Category::class . '_' . "normal$key", $category);
    }

    foreach (self::$specialCategories as $key => $specialCategory) {
      $category = new Category();
      $this->setCategoryData($category, $specialCategory, "special");
      $manager->persist($category);
      // store for usage later as App\Entity\ClassName_#COUNT#
      $this->addReference(Category::class . '_' . "special$key", $category);
    }


    $manager->flush();
  }

  private function setCategoryData(Category $category, string $categoryName, string $categoryType)
  {
    $category->setName($categoryName);
    $category->setTerm($categoryType);
    $category->setDescription($this->faker->realText());
  }
}
