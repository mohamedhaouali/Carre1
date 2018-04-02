<?php

namespace Myapp\GestionProjetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use FOS\UserBundle\Form\Type\RegistrationFormType;

class ClientType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('nom', TextType::class,array('required'=>true, 'attr'=> array('placeholder'=>'Nom')))
                ->add('prenom', TextType::class,array('required'=>true, 'attr'=> array('placeholder'=>'Nom')))
                ->add('adresse',TextareaType::class,array('required'=>true, 'attr'=> array('placeholder'=>'Adresse')))
                ->add('telephone',NumberType::class,array('required'=>true, 'attr'=> array('placeholder'=>'telephone')))
                ->add('name', EntityType::class, array(
                    // query choices from this entity
                    'class' => 'UserBundle:User',
                    // use the User.username property as the visible option string
                    'choice_label' => 'name',
                    'multiple' => false
                    
                       
                        )
        )
         ->add('user',new RegistrationFormType("\Myapp\UserBundle\Entity\User"))
        ;        
        
       
        
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Myapp\GestionProjetBundle\Entity\Client'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'myapp_gestionprojetbundle_client';
    }


}
