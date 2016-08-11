<?php

namespace RioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use RioBundle\Entity\Atlhete;
use RioBundle\Form\AtlheteType;

/**
 * Atlhete controller.
 *
 * @Route("/atlhete")
 */
class AtlheteController extends Controller
{
    /**
     * Lists all Atlhete entities.
     *
     * @Route("/", name="atlhete_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $atlhetes = $em->getRepository('RioBundle:Atlhete')->findAll();

        return $this->render('atlhete/index.html.twig', array(
            'atlhetes' => $atlhetes,
        ));
    }

    /**
     * Creates a new Atlhete entity.
     *
     * @Route("/new", name="atlhete_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $atlhete = new Atlhete();
        $form = $this->createForm('RioBundle\Form\AtlheteType', $atlhete);
        $form->handleRequest($request);

        $epreuves= $em->getRepository('RioBundle:Epreuve')->findAll();

        if ($form->isSubmitted() && $form->isValid()) {

            $epreuve_id = $request->request->get('epreuve');

            $epreuve = $em->getRepository('RioBundle:Epreuve')->findOneById($epreuve_id);

            $atlhete->setEpreuve($epreuve);

            $em->persist($atlhete);
            $em->flush();

            return $this->redirectToRoute('atlhete_show', array('id' => $atlhete->getId()));
        }

        return $this->render('atlhete/new.html.twig', array(
            'atlhete' => $atlhete,
            'form' => $form->createView(),
            'epreuves'=>$epreuves,
        ));
    }

    /**
     * Finds and displays a Atlhete entity.
     *
     * @Route("/{id}", name="atlhete_show")
     * @Method("GET")
     */
    public function showAction(Atlhete $atlhete)
    {
        $deleteForm = $this->createDeleteForm($atlhete);

        return $this->render('atlhete/show.html.twig', array(
            'atlhete' => $atlhete,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Atlhete entity.
     *
     * @Route("/{id}/edit", name="atlhete_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Atlhete $atlhete)
    {
        $deleteForm = $this->createDeleteForm($atlhete);
        $editForm = $this->createForm('RioBundle\Form\AtlheteType', $atlhete);
        $editForm->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $epreuves= $em->getRepository('RioBundle:Epreuve')->findAll();

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $epreuve_id = $request->request->get('epreuve');

            $epreuve = $em->getRepository('RioBundle:Epreuve')->findOneById($epreuve_id);

            $atlhete->setEpreuve($epreuve);

            $em->persist($atlhete);
            $em->flush();

            return $this->redirectToRoute('atlhete_edit', array('id' => $atlhete->getId()));
        }

        return $this->render('atlhete/edit.html.twig', array(
            'atlhete' => $atlhete,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'epreuves'=>$epreuves,
        ));
    }

    /**
     * Deletes a Atlhete entity.
     *
     * @Route("/{id}", name="atlhete_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Atlhete $atlhete)
    {
        $form = $this->createDeleteForm($atlhete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($atlhete);
            $em->flush();
        }

        return $this->redirectToRoute('atlhete_index');
    }

    /**
     * Creates a form to delete a Atlhete entity.
     *
     * @param Atlhete $atlhete The Atlhete entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Atlhete $atlhete)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('atlhete_delete', array('id' => $atlhete->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
