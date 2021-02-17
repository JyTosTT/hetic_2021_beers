<?php

namespace App\DataFixtures;

use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;

class CategoryFixtures extends BaseFixtures
{

  private static $normalCategories = ['blonde', 'brune', 'blanche'];
  private static $specialCategories =
  ['houblon', 'rose', 'menthe', 'grenadine', 'réglisse', 'marron', 'whisky', 'bio'];

  public function loadData(ObjectManager $manager)
  {

    foreach (self::$normalCategories as $key => $normalCategory) {
      $this->createOne(
        Category::class,
        function (Category $category) use ($normalCategory) {
          $this->setCategoryData($category, $normalCategory, "normal");
        },
        "normal$key"
      );
    }

    foreach (self::$specialCategories as $key => $specialCategory) {
      $this->createOne(
        Category::class,
        function (Category $category) use ($specialCategory) {
          $this->setCategoryData($category, $specialCategory, "special");
        },
        "special$key"
      );
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
