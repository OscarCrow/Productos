<?php

namespace ProductsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class CategoriesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', TextType::class, array(
                "attr" => array(
                    "class" => "form-control"
                )))
            ->add('name', TextType::class, array(
                "attr" => array(
                    "class" => "form-control",
                    "minlength" => "2"
                )))
            ->add('description', TextareaType::class, array(
                "attr" => array(
                    "class" => "form-control"
                )))
            ->add('active', CheckboxType::class)
            ->add('Guardar', SubmitType::class, array(
                "attr" => array(
                    "class" => "btn btn-primary"
            )));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProductsBundle\Entity\Categories'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'productsbundle_categories';
    }


}