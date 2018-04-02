<?php

namespace Myapp\GestionProjetBundle\Controller;

use Myapp\GestionProjetBundle\Entity\Auteur;
use Myapp\GestionProjetBundle\Form\AuteurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Auteur controller.
 *
 */
class AuteurController extends Controller
{
    /**
     * Lists all auteur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $auteurs = $em->getRepository('GestionProjetBundle:Auteur')->findAll();

        return $this->render('auteur/index.html.twig', array(
            'auteurs' => $auteurs,
        ));
    }

    public function modifierAction() {
        $em = $this->getDoctrine()->getManager();

        $auteurs = $em->getRepository('GestionProjetBundle:Auteur')->findAll();

        return $this->render('auteur/modifier.html.twig', array(
                    'auteurs' => $auteurs,
        ));
    }
    
    
 
    
    
    /**
     * Creates a new auteur entity.
     *
     */
    public function newAction(Request $request)
    {
        $auteur = new Auteur();
        $form = $this->createForm('Myapp\GestionProjetBundle\Form\AuteurType', $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($auteur);
            $em->flush();
            
            

            return $this->redirectToRoute('auteur_show', array('id' => $auteur->getId()));
        }

        return $this->render('auteur/new.html.twig', array(
            'auteur' => $auteur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a auteur entity.
     *
     */
    public function showAction(Auteur $auteur)
    {
        $deleteForm = $this->createDeleteForm($auteur);

        return $this->render('auteur/show.html.twig', array(
            'auteur' => $auteur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing auteur entity.
     *
     */
    public function editAction(Request $request, Auteur $auteur)
    {
        $deleteForm = $this->createDeleteForm($auteur);
        $editForm = $this->createForm('Myapp\GestionProjetBundle\Form\AuteurType', $auteur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($auteur);
            $em->flush();
            

            return $this->redirectToRoute('auteur_edit', array('id' => $auteur->getId()));
        }

        return $this->render('auteur/edit.html.twig', array(
            'auteur' => $auteur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a auteur entity.
     *
     */
    public function deleteAction($id)
    {
         $cox = $this->getDoctrine()->getManager();

        $acteur = $cox->getRepository("GestionProjetBundle:Auteur")->find($id);
        $cox->remove($acteur);
        $cox->flush();

        return $this->redirect($this->generateUrl("auteur_index"));
    }
    
    
    
 

    /**
     * Creates a form to delete a auteur entity.
     *
     * @param Auteur $auteur The auteur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Auteur $auteur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('auteur_delete', array('id' => $auteur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
