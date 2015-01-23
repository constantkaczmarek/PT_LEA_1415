<?php

namespace LEA\RespBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class AttributionType extends AbstractType
{


    protected $listTuteurs;

    function __construct($listTuteur){
        $this->listTuteurs = $listTuteur;

    }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('listTuteurs', 'choice', array(
                'label' => false,
                'expanded' => true,
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LEA\RespBundle\Entity\Attribution'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'AttributionType';
    }

}
