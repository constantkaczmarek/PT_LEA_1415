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

class infosMissionsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('service','text',array(
                'label' => 'Services :'
            ))
            ->add('client','text',array(
                'label' => 'Clients :  :'
            ))
            ->add('missions','textarea',array(
                'required' => false,
                'label' => 'Quelles sont les missions confiées ? ',
            ))
            ->add('technos','textarea',array(
                'required' => false,
                'label' => 'Dans quel domaine technologique ? '
            ))
            ->add('motscles','text',array(
                'label' => 'Mots-clés : '
            ))
/*            ->add('Revenir','button')
            ->add('Enregistrer','button')*/
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LEA\EtuBundle\Entity\infosMission'
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
