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
                'label' => 'Date rencontre (jj-mm-aaaa): ',
                'input' => 'string',
                'format'=> 'dd-MM-yyyy'
            ))
            ->add('service', 'text', array(
                'label' => 'Service/Projet: '
            ))
            ->add('client', 'text', array(
                'label' => 'Eventuellement client: '
            ))
            ->add('missions', 'text', array(
                'label' => 'Quelles sont (ou seront) les missions confiées? '
            ))
            ->add('environnementTechnique', 'text', array(
                'label' => 'Dans quel environnement technique? '
            ))
            ->add('integrationEntreprise', 'text', array(
                'label' => "Comment se passe l'intégration dans l'entreprise? "
            ))
            ->add('motscles', 'text', array(
                'label' => 'Mots-clés: '
            ))
            ->add('signatureTuteur', 'checkbox', array(
                'label'     => 'Validation du tuteur',
                'required'  => false,
            ))
            ->add('remarquesTuteur', 'text',array(
                'label' => 'Remarques éventuelles :'
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