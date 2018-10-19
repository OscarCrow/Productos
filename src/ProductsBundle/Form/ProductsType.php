<?php

namespace ProductsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Doctrine\ORM\EntityRepository;
use ProductsBundle\Entity\Categories;

class ProductsType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('code', TextType::class, array(
                    "attr" => array(
                        "class" => "form-control"
            )))
                ->add('name', TextType::class, array(
                    "attr" => array(
                        "class" => "form-control"
            )))
                ->add('description', TextareaType::class, array(
                    "attr" => array(
                        "class" => "form-control"
            )))
                ->add('brand', TextType::class, array(
                    "attr" => array(
                        "class" => "form-control"
            )))
                ->add('price', TextType::class, array(
                    "attr" => array(
                        "class" => "form-control"
            )))
                ->add('idcategories', EntityType::class, array(
                    'class' => Categories::class,
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                                ->where('u.active = 1')
                                ->orderBy('u.name', 'ASC');
                    },
                    'choice_label' => 'name',
                    "attr" => array(
                        "class" => "form-control"
            )))
                ->add('Guardar', SubmitType::class, array(
                    "attr" => array(
                        "class" => "btn btn-success mt-3"
        )));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ProductsBundle\Entity\Products'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'productsbundle_products';
    }

}
