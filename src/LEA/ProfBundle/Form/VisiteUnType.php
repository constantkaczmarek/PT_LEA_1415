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
                'label' => 'Date rencontre (jj-mm-aaaa): ',
                'input' => 'string',
                'format'=> 'dd-MM-yyyy'
            ))
            ->add('adequationMission', 'text', array(
                'label' => 'Le travail est-il en adéquation avec la mission confiée ? '
            ))
            ->add('integrationEtudiant', 'text', array(
                'label' => "Comment s'est passé l'intégration de l'étudiant ? "
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
