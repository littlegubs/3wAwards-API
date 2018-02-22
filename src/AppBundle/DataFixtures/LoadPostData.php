<?php

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Post;

class LoadPostData extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $post = new Post();
        $post->setTitle('post1');

        $post2 = new Post();
        $post2->setTitle('post2');

        $manager->persist($post);
        $manager->persist($post2);
        $manager->flush();
    }
}