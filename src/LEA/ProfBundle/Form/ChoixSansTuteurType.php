<?php

namespace LEA\ProfBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ChoixSansTuteurType extends AbstractType
{

    private $listEtu;


    public function __construct($listEtu)
    {
        $this->listEtu = $listEtu;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('altCle', 'choice', array(
                'label' => false,
                'choices' => $this->listEtu,
                'multiple'  => true,
                'expanded' => true,
                'required' =>false,
                'mapped' => true,
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LEA\ProfBundle\Entity\ChoixSansTuteur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ChoixSansTuteurType';
    }

}
