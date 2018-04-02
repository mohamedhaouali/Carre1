<?php

namespace Myapp\DataBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Myapp\GestionProjetBundle\Entity\Article;


class LoadArticleData extends AbstractFixture implements OrderedFixtureInterface {
    
   public function load(ObjectManager $manager) {


        $article = new Article();
        $article->setTitre('caree');
        $article->setDescription('bb');
       
        $manager->persist($article); 
        
        
        $article1 = new Article();
        $article1->setTitre('medbac');
        $article1->setDescription('jjjjjjj');
        
        $manager->persist($article1); 
        
        
        $article2 = new Article();
        $article2->setTitre('business');
        $article2->setDescription('yyy');
        
        $manager->persist($article2);  
        
        $manager->flush();

        $this->addReference('E', $article);
        $this->addReference('E1', $article1);
        $this->addReference('E2', $article2);
       
        
        
        
        
        
   }    
        
   public function getOrder() {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }     
    
}

