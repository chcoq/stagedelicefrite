<?php

namespace  App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class AppController extends  Controller
{
    /**
     * @Route("/accueil", name="homePage")
     */
    public function accueil(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $menus = $em->getRepository('App:Menu')->findAll();//Select * from Menu
        $cats = $em->getRepository('App:Category')->findAll();//Select * from Menu
        $prods = $em->getRepository('App:Product')->findAll();

        return $this-> render('/Accueil.html.twig',[
            'menus'=>$menus,
            'cats'=>$cats,
            'prods'=>$prods
        ]);
    }



}

/*
 *
 * SELECT name_cat, name, price FROM menu INNER JOIN category on category.id = menu.category_id WHERE name_cat='seul'
 */