<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;

class UserFixture extends Fixture
{
    /**
     * load
     *
     * @param  mixed $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('Jeeten');
        $user->setEmail('swain.jeeten@gmail.com');
        $user->setPassword('jeeten@123');
        $user->setRoles(['ROLE_USER']);
        $manager->persist($user);
        $manager->flush();
    }
}
