<?php

namespace Myapp\GestionProjetBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ArticleAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('titre')
            ->add('description')  
            ->add('nom')
              
                
   

            // add custom action links
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                  
                )
            ))
        ;
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
          ->add('titre')
          ->add('description')  
          ->add('nom'); 

    }

     protected function configureDatagridFilters(DatagridMapper $datagrid)
    {
        $datagrid
          ->add('titre')
          ->add('description')  
          ->add('nom');  
           
        ;
    }
    
}

?>
