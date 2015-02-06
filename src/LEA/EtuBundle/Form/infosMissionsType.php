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
                'label' => false
            ))
            ->add('client','text',array(
                'label' => false
            ))
            ->add('missions','textarea',array(
                'required' => false,
                'label' => false,
            ))
            ->add('technos','textarea',array(
                'required' => false,
                'label' => false
            ))
            ->add('motscles','text',array(
                'label' => false
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
