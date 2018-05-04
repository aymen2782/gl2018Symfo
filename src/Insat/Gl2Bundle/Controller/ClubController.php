<?php

namespace Insat\Gl2Bundle\Controller;

use Insat\Gl2Bundle\Entity\Club;
use Insat\Gl2Bundle\Form\ClubType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ClubController extends Controller
{
    public function showFormAction(Request $request,Club $club)
    {

        //$club = new Club();
        $form = $this->createForm(ClubType::class,$club);

        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($club);
            $em->flush();

            return $this->render('@InsatGl2/Club/list_clubs.html.twig',array(
                'club'=>$club
            ));
        }

        return $this->render('@InsatGl2\Club\show_form.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function listClubsAction()
    {
        return $this->render('InsatGl2Bundle:Club:list_clubs.html.twig', array(
            // ...
        ));
    }

}
