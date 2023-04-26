<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 50; $i++) {
            $product = (new Product())
                ->setTitle($faker->words(3, true))
                ->setPrice($faker->randomFloat(2, 10, 100));

            $manager->persist($product);
        }

        $manager->flush();
    }
}
