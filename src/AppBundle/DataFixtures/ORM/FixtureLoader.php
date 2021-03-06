<?php

namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Symfony\Component\Security\Core\User\UserInterface;

class FixtureLoader extends DataFixtureLoader
{
    /**
     * {@inheritDoc}
     */
    protected function getFixtures()
    {
        $prefix = __DIR__ . '/../Fixture/';

        return [
            $prefix . 'admin.yml',
            $prefix . 'city.yml',
            $prefix . 'country.yml',
            $prefix . 'location.yml',
            $prefix . 'user.yml',
            $prefix . 'voteSetting.yml',            
            $prefix . 'project.yml'
        ];
    }

    public function characterConfirm()
    {
        $names = array(
            'approved',
            'not_approved'
        );

        return $names[array_rand($names)];
    }

    /**
     * @param UserInterface $user
     * @param $plainPassword
     * @return string
     */
    public function encodePassword(UserInterface $user, $plainPassword)
    {
        return $this->container->get('security.password_encoder')->encodePassword($user, $plainPassword);
    }
}