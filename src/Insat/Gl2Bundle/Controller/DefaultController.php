<?php

namespace Insat\Gl2Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
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

    private function somme($x,$y){
         return $x+$y;
    }
    public function testAction($param){
        return $this->render('@InsatGl2/Default/test.html.twig',
            array(
                'nom'=>$param
            )
            );
    }
}
