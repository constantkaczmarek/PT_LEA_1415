<?php

namespace LEA\RespBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ListAttributionType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */


    protected $listTuteurs;

    function __construct($listTuteurs){
        print_r($listTuteurs);
        $this->listTuteurs = $listTuteurs;
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('attributions', 'collection', array(
                'type'   => 'choice',
                'options'  => array(
                    'expanded' => true,
                    'choices'  => array(
                        'ROLE_CONTENT' => 'Innehåll',
                        'ROLE_LAYOUT'     => 'Skärmlayout',
                        'ROLE_VIDEO'    => 'Videouppladdning',
                        'ROLE_ADMIN'    => 'Administratör',
                    ),
                ),
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LEA\RespBundle\Entity\ListAttributions'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ListAttributionType';
    }

}
