<?php

namespace Insat\Gl2Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TodoController extends Controller
{
    public function indexAction(Request $request)
    {
        $session = $request->getSession();

        if(!$session->has('mesTodos')){
            $todos = array('lundi'=>'manger',
                'mardi'=>'sport'
            );
            $session->set('mesTodos',$todos);
        }
        return $this->render('@InsatGl2\Default\index.html.twig');

    }

    public function addTodoAction(Request $request,$cle, $valeur)
    {
        $session = $request->getSession();

        if($session->has('mesTodos')) {
          $todos = $session->get('mesTodos');
          $todos[$cle]=$valeur;
          $session->set('mesTodos',$todos);
        }

        return $this->forward('InsatGl2Bundle:Todo:index');
    }

    public function accueilAction(){
        return $this->render('base.html.twig');
    }

    public function testhAction(){
        return $this->render('@InsatGl2/Default/test.html.twig');
    }

}
