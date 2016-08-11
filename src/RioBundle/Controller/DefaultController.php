<?php

namespace RioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use RioBundle\Entity\Vote;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$user=$this->getUser();

    	$epreuves = $em->getRepository('RioBundle:Epreuve')->findBy(
  			array(), 
  			array('id' => 'desc'),
  			3,
 			0
 		);

        return $this->render('RioBundle:Default:index.html.twig', array( 
        	'user'=>$user,
        	'epreuves'=>$epreuves
        ));
    }

    public function epreuveAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$user=$this->getUser();

    	$epreuve = $em->getRepository('RioBundle:Epreuve')->findOneById($id);

        return $this->render('RioBundle:Default:epreuve.html.twig', array( 
        	'user'=>$user,
        	'epreuve'=>$epreuve
        ));
    }

    public function voteAction(Request $request, $id_epreuve, $id_atlhete)
    {
    	$em = $this->getDoctrine()->getManager();
    	$user=$this->getUser();

        $exist = $em->getRepository('RioBundle:Vote')->findOneBy(
            array( 
                'idEpreuve'=>$id_epreuve,
                'idAthlete'=>$id_atlhete,     
            )
        );

        if($exist!='null'){
        }
        else{
            $vote = new Vote();

            $vote->setIdepreuve($id_epreuve);
            $vote->setIdathlete($id_atlhete);
            $vote->setScore('1');

            $em->persist($vote);
            $em->flush();
        }

        $request->getSession()->getFlashBag()->add('succéss', 'Merci d\'avoir voté');

        return $this->redirectToRoute('index');
    }
}
