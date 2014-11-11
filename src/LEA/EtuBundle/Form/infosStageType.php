<?php
/**
 * Created by PhpStorm.
 * User: Kashma
 * Date: 08/11/14
 * Time: 18:19
 */

namespace LEA\EtuBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class infosStageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tel','number',array(
                'label' => 'Téléphone personnel :'
            ))

            ->add('mail','email',array(
                'label' => 'E-mail  :  :'
            ))

            ->add('mailLille1','email',array(
                'label' => 'E-mail lille1  :  :'
            ))

            ->add('tuteur','text',array(
                'label' => 'Tuteur  :',
                'read_only' => true
            ))

            ->add('entreprise','choice',array(
                'required' => false,
                'label' => ' L\'entreprise ',
            ))

            ->add('bureau','choice',array(
                'required' => false,
                'label' => 'Bureau '
            ))

            ->add('referent','choice',array(
                'required' => false,
                'label' => 'Référent 1  '
            ))

            ->add('referent1','choice',array(
                'required' => false,
                'label' => 'Référent 2 '
            ))

            ->add('referent1','choice',array(
                'required' => false,
                'label' => 'Référent 2 '
            ))

            ->add('datecontrat','date',array(
                'required' => false,
                'label' => 'Date de signature du contrat'
            ))

            ->add('dateDebutcontrat','date',array(
                'required' => false,
                'label' => 'Date de début de contrat '
            ))

            ->add('dateFincontrat','date',array(
                'required' => false,
                'label' => 'Date de fin de contrat '
            ))

            ->add('entrepriseAlt','choice',array(
                'required' => false,
                'label' => 'REGIE : '
            ))

            ->add('bureauAlt','choice',array(
                'required' => false,
                'label' => 'Bureau '
            ))

            ->add('referentAlt','choice',array(
                'required' => false,
                'label' => 'Référent 1  '
            ))

            ->add('referent1Alt','choice',array(
                'required' => false,
                'label' => 'Référent 2 '
            ))

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LEA\EtuBundle\Entity\infosStage'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'infosMissionForm';
    }
}
