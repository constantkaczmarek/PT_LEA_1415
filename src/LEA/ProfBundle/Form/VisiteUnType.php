<?php
/**
 * Created by PhpStorm.
 * User: alan_flament
 * Date: 08/01/15
 * Time: 19:40
 */
namespace LEA\ProfBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class VisiteUnType extends AbstractType
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
            ->add('adequationMission', 'textarea', array(
                //'label' => 'Le travail est-il en adéquation avec la mission confiée ? '
                'label' => false,
            ))
            ->add('integrationEtudiant', 'textarea', array(
                //'label' => "Comment s'est passé l'intégration de l'étudiant ? "
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
            'data_class' => 'LEA\ProfBundle\Entity\VisiteUn'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'VisiteUnType';
    }
}
