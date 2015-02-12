<?php

namespace LEA\EtuBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class SignatureEtudiantType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('signatureEtud', 'checkbox', array(
                //'label'     => 'Validation de l étudiant',
                'label'     => false,
                'required'  => false,
            ))
            ->add('remarquesEtud', 'textarea',array(
                //'label' => 'Remarques éventuelles :'
                'label'     => false,
            ))
        ;

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LEA\EtuBundle\Entity\SignatureEtudiant'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'SignatureEtudiantType';
    }

}
