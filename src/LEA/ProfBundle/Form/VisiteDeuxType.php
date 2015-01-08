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
                'label' => 'Date rencontre (jj-mm-aaaa): ',
                'input' => 'string',
                'format'=> 'dd-MM-yyyy'
            ))
            ->add('pointsPositifs', 'text', array(
                'label' => 'Quels sont les points positifs ? '
            ))
            ->add('pointsProgres', 'text', array(
                'label' => "Quels sont les points de progrès ? "
            ))
            ->add('avancementProjet', 'text', array(
                'label' => "Quel est l'avancement du projet ? "
            ))
            ->add('dateProbableSoutenance','date',array(
                'label' => 'Date probable de soutenance  (jj-mm-aaaa): ',
                'input' => 'string',
                'format'=> 'dd-MM-yyyy'
            ))
            ->add('signatureTuteur', 'checkbox', array(
                'label'     => 'Validation du tuteur',
                'required'  => false,
            ))
            ->add('remarquesTuteur', 'text',array(
                'label' => 'Remarques éventuelles :'
            ))
            ->add('signatureReferent', 'checkbox', array(
                'label'     => 'Validation du référent',
                'required'  => false,
            ))
            ->add('remarquesReferent', 'text',array(
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
