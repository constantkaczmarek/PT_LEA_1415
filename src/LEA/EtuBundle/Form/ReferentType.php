<?php

namespace LEA\EtuBundle\Form;

use LEA\EtuBundle\EventListener\FormStageSubscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;


class ReferentType extends AbstractType
{

    private $listBureau;

    public function __construct($listBureau)
    {
        $this->listBureau = $listBureau;
    }

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

            ->add('prenom','text',array(
                'label' => 'Prenom :'
            ))

            ->add('tel','number',array(
                'label' => 'Téléphone :'
            ))

            ->add('mail','email',array(
                'label' => 'E-mail :'
            ))

            ->add('fonction','text',array(
                'label' => 'Fonction :'
            ))

            ->add('bureau','choice',array(
                'required' => false,
                'label' => 'Bureau ',
                'choices' => $this->listBureau
            ))
        ;

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LEA\EtuBundle\Entity\Referent'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ReferentType';
    }


}
