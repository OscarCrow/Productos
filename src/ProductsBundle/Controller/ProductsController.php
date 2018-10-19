<?php

namespace ProductsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ProductsBundle\Form\ProductsType;
use ProductsBundle\Entity\Products;

class ProductsController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $poducts = $em->getRepository('ProductsBundle:Products')->findAll();

        return $this->render('ProductsBundle:Product:index.html.twig', array(
                    'poducts' => $poducts
        ));
    }

    public function addAction(Request $request) {

        $products = new Products();

        $form = $this->createForm(ProductsType::class, $products);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $category = $em->getRepository('ProductsBundle:Categories')->find($form->get('idcategories')->getData());

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

    public function editAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('ProductsBundle:Products')->find($id);

        $form = $this->createForm(ProductsType::class, $products);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $category = $em->getRepository('ProductsBundle:Categories')->find($form->get('idcategories')->getData());

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

        return $this->render('ProductsBundle:Product:editar.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    public function deleteAction($id) {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository('ProductsBundle:Products')->find($id);

        $em->remove($product);
        $em->flush();

        return $this->redirectToRoute("products_index");
    }

}
