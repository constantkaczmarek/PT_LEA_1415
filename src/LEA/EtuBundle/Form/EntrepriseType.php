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

class EntrepriseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text',array(
                'label' => 'Nom :'
            ))
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
            ->add('opca','choice',array(
                'required' => false,
                'label' => 'OPCA ',
                'choices' => array()
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
            'data_class' => 'LEA\EtuBundle\Entity\Entreprise'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'EntrepriseForm';
    }
}
