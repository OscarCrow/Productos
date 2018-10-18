<?php

namespace ProductsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ProductsBundle\Form\ProductsType;
use ProductsBundle\Entity\Products;

class ProductsController extends Controller {

    public function indexAction() {
        return $this->render('ProductsBundle:Product:index.html.twig');
    }
    
    public function addAction(Request $request){
        
        $products = new Products();
        
        $form = $this->createForm(ProductsType::class, $products);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                
                $category = $em->getRepository('ProductsBundle:Categories')->find($form->get('idcategories')->getData());

                $products = new Products();
                $products->setCode($form->get('code')->getData());                
                $products->setName($form->get('name')->getData());                
                $products->setDescription($form->get('description')->getData());                
                $products->setBrand($form->get('brand')->getData());                
                $products->setPrice($form->get('price')->getData());                
                $products->setIdcategories($category);                

                $em->persist($products);
                $em->flush();
            }
            
            return $this->redirectToRoute("products_index");
        }

        return $this->render('ProductsBundle:Product:from.html.twig', array(
                    'form' => $form->createView()
        ));
    }

}
