<?php

namespace MGD\BasicBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use MGD\BasicBundle\Entity\Cola;


class LoadColaData extends AbstractFixture implements OrderedFixtureInterface
{
    const REFERRALS_PER_DAY = 50;

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $cola = new Cola();
        $cola->setReferalsPerDay(self::REFERRALS_PER_DAY);
        $cola->setText("");

        $manager->persist($cola);

        $manager->flush();
    }


    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 20; // the order in which fixtures will be loaded
    }
}

