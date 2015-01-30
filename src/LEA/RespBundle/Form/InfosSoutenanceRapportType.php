<?php

namespace LEA\RespBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class InfosSoutenanceRapportType extends AbstractType
{


    /*protected $listTuteurs;

    function __construct($listTuteur){
        $this->listTuteurs = $listTuteur;

    }*/

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('datesSoutenances', 'text', array(
                'label' => false,
            ))
            ->add('dateRemise', 'text', array(
                'label' => false,
            ))
            ->add('longueurRapport', 'text', array(
                'label' => false,
            ))
            ->add('dureeSoutenance', 'text', array(
                'label' => false,
            ))
            ->add('observationsTous', 'textarea', array(
                'label' => false,
            ))
            ->add('observationsTuteurs', 'textarea', array(
                'label' => false,
            ))
            ->add('lienExterne', 'textarea', array(
                'label' => false,
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LEA\RespBundle\Entity\InfosSoutenanceRapport'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'InfosSoutenanceRapportType';
    }

}
