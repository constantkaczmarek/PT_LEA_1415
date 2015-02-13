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


class VisiteDeuxType extends AbstractType
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
            ->add('pointsPositifs', 'textarea', array(
                //'label' => 'Quels sont les points positifs ? '
                'label' => false,
            ))
            ->add('pointsProgres', 'textarea', array(
                //'label' => "Quels sont les points de progrès ? "
                'label' => false,
            ))
            ->add('avancementProjet', 'textarea', array(
                //'label' => "Quel est l'avancement du projet ? "
                'label' => false,
            ))
            ->add('dateProbableSoutenance','date',array(
                //'label' => 'Date probable de soutenance  (jj-mm-aaaa): ',
                'label' => false,
                'input' => 'string',
                'format'=> 'dd-MM-yyyy'
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
            'data_class' => 'LEA\ProfBundle\Entity\VisiteDeux'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'VisiteDeuxType';
    }
}
