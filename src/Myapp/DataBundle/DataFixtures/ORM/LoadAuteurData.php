<?php

namespace Myapp\DataBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Myapp\GestionProjetBundle\Entity\Auteur;


class LoadAuteurData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $aut1=new Auteur();
        $aut1->setNom('mohamed');
        $manager->persist($aut1);
        
        $aut2=new Auteur();
        $aut2->setNom('safouan');
        $manager->persist($aut2);
        
        $aut3=new Auteur();
        $aut3->setNom('ali');
        $manager->persist($aut3);
        
        $manager->flush();

        $this->addReference('a1', $aut1);
        $this->addReference('a2', $aut2);
        $this->addReference('a3', $aut3);

    }
    
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
    
    
}





?>