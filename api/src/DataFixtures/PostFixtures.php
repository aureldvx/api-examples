<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Post;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $posts = [];
        for ($i = 0; $i <= 50; $i += 1) {
            $post = new Post();
            $post->setTitle($faker->word(10));
            $post->setContent($faker->text(400));
            $post->setCreatedAt(new DateTimeImmutable($faker->dateTime()->format('Y-m-d H:i:s')));
            $post->setUpdatedAt(new DateTimeImmutable($faker->dateTime()->format('Y-m-d H:i:s')));
            $posts[] = $post;
            $manager->persist($post);
        }

        for ($i = 0; $i <= 25; $i += 1) {
            $category = new Category();
            $category->setName($faker->word(10));
            $category->setCreatedAt(new DateTimeImmutable($faker->dateTime()->format('Y-m-d H:i:s')));
            $category->setUpdatedAt(new DateTimeImmutable($faker->dateTime()->format('Y-m-d H:i:s')));
            $category->addPost($posts[$i]);
            $category->addPost($posts[$i * 2]);
            $manager->persist($category);
        }

        $manager->flush();
    }
}
