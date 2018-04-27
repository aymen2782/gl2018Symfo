<?php

namespace Insat\Gl2Bundle\Controller;

use Insat\Gl2Bundle\Entity\Personne;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PersonneController extends Controller
{
    public function addAction()
    {
        $personne = new Personne();
        $personne->setPrenom('new');
        $personne->setNom('new');
        $personne->setAge(22);

        $personne2 = new Personne();
        $personne2->setPrenom('new 2');
        $personne2->setNom('new 2');
        $personne2->setAge(222);


        //selectionne mon Entity Manager
        $em = $this->getDoctrine()->getManager();


        $em->persist($personne);
        $em->persist($personne2);

        $em->flush();

        return $this->forward('InsatGl2Bundle:Personne:show');
    }

    public function showAction()
    {
        //selectionne mon Entity Manager
        $em = $this->getDoctrine()->getManager();

        //recupérer le repo
        $repository = $em->getRepository('InsatGl2Bundle:Personne');

        $personnes = $repository->findAll();


        return $this->render('@InsatGl2\Personne\show.html.twig',
            array(
            'personnes'=> $personnes
        ));
    }

    public function updatePersonneAction(Request $request,Personne $personne=null){

        if($personne)
        {

        $personne->setPrenom('eesm jdid');
//selectionne mon Entity Manager
        $em = $this->getDoctrine()->getManager();


        $em->persist($personne);

        $em->flush();
        $request->getSession()->getFlashBag()->add('success','user ok');

        }else{
            $request->getSession()->getFlashBag()->add('error','user innexistant');
        }

        return $this->forward('InsatGl2Bundle:Personne:show');


    }
}
