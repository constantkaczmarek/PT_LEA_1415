<?php

namespace LEA\ProfBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MissionSoutenanceType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('dateRencontre','date',array(
                //'label' => 'Date rencontre (jj-mm-aaaa): ',
                'label' => false,
                'input' => 'string',
                'format'=> 'dd-MM-yyyy'
            ))
            ->add(
                'typeRencontre','choice',array(
                    'choices' => array(
                        'rdvuniv'   => 'rdv univ',
                        'mail'      => 'mail',
                        'tel'       => 'tel',
                        'visite'    => 'visite',
                    ),
                    'multiple' => false,
                    'expanded' => false,
            ))
            ->add('dateValidation','date',array(
                //'label' => 'Date validation (jj-mm-aaaa): ',
                'label' => false,
                'input' => 'string',
                'format'=> 'dd-MM-yyyy'
            ))
            ->add('missions', 'textarea', array(
                //'label' => 'Quelle est la mission (ou partie de mission) choisie ?'
                'label' => false,
            ))
            ->add('environnementTechnique', 'textarea', array(
                //'label' => "Dans quel environnement technique ?"
                'label' => false,
            ))
            ->add('enjeux', 'textarea', array(
                //'label' => "Avec quels enjeux pour l'entreprise et/ou le client ?"
                'label' => false,
            ))
            ->add('signatureTuteur', 'checkbox', array(
                //'label'     => 'Validation du tuteur',
                'label' => false,
                'required'  => false,
            ))
            ->add('remarquesTuteur', 'textarea',array(
                //'label' => 'Remarques éventuelles :'
                'label' => false,
            ))
            ->add('signatureReferent', 'checkbox', array(
                //'label'     => 'Validation du référent',
                'label' => false,
                'required'  => false,
            ))
            ->add('remarquesReferent', 'textarea',array(
                //'label' => 'Remarques éventuelles :'
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
            'data_class' => 'LEA\ProfBundle\Entity\MissionSoutenance'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'MissionSoutenanceType';
    }
}