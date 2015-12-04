<?php
/**
 * Created by PhpStorm.
 * User: dasha
 * Date: 04.12.15
 * Time: 20:15
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setUsername('admin');

        $password = 'password';
        $encoder = $this->container->get('security.password_encoder');
        $encoded = $encoder->encodePassword($admin, $password);

        $admin->setUsername('admin');
        $admin->setPassword($encoded);
        $admin->setEmail('admin@mail.com');
        $admin->setIsActive(true);

        $manager->persist($admin);
        $manager->flush();
    }
}