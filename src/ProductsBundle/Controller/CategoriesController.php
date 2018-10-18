<?php

namespace ProductsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ProductsBundle\Entity\Categories;
use ProductsBundle\Form\CategoriesType;

class CategoriesController extends Controller {

    public function addAction(Request $request) {
        $categories = new Categories();

        $form = $this->createForm(CategoriesType::class, $categories);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $categories = new Categories();
                $categories->setCode($form->get('code')->getData());
                $categories->setName($form->get('name')->getData());
                $categories->setDescription($form->get('description')->getData());
                $categories->setActive($form->get('active')->getData());

                $em->persist($categories);
                $em->flush();
            }
            
            return $this->redirectToRoute("categories_index");
        }

        return $this->render('ProductsBundle:Categories:from.html.twig', array(
                    'form' => $form->createView()
        ));
    }
    
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
        
        $categories = $em->getRepository('ProductsBundle:Categories')->findAll();
        
        return $this->render('ProductsBundle:Categories:index.html.twig', array(
                    'categories' => $categories
        ));
    }

}
