<?php

namespace LEA\ProfBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class RencontreEtuType extends AbstractType
{

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
            ->add('service', 'text', array(
                //'label' => 'Service/Projet: '
                'label' => false,
            ))
            ->add('client', 'text', array(
                //'label' => 'Eventuellement client: '
                'label' => false,
            ))
            ->add('missions', 'textarea', array(
                //'label' => 'Quelles sont (ou seront) les missions confiées? '
                'label' => false,
            ))
            ->add('environnementTechnique', 'textarea', array(
                //'label' => 'Dans quel environnement technique? '
                'label' => false,
            ))
            ->add('integrationEntreprise', 'textarea', array(
                //'label' => "Comment se passe l'intégration dans l'entreprise? "
                'label' => false,
            ))
            ->add('motscles', 'textarea', array(
                //'label' => 'Mots-clés: '
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
        ;

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LEA\ProfBundle\Entity\RencontreEtu'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'RencontreType';
    }
}