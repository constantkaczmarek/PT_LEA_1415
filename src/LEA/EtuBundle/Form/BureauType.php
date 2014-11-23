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

class BureauType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adresse','text',array(
                'label' => 'Adresse :'
            ))
            ->add('ville','text',array(
                'label' => 'Ville : ',
            ))
            ->add('cp','number',array(
                'label' => 'Code postal :  '
            ))
            ->add('tel','number',array(
                'required' => false,
                'label' => 'Téléphone : '
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
            'data_class' => 'LEA\EtuBundle\Entity\Bureau'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'BureauForm';
    }
}
