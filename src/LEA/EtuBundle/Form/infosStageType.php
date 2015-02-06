<?php

namespace LEA\EtuBundle\Form;

use LEA\EtuBundle\EventListener\FormStageSubscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;


class infosStageType extends AbstractType
{

    private $infos;
    private $listEntr;
    private $listBureau;
    private $listRef;
    private $listBureauAlt;
    private $listRefAlt;
    private $listTuteur;

    public function __construct($infos,$listEntr,$listBureau,$listRef,$listBureauAlt,$listRefAlt,$listTuteur)
    {
        $this->infos = $infos;
        $this->listEntr = $listEntr;
        $this->listBureau = $listBureau;
        $this->listRef = $listRef;
        $this->listBureauAlt = $listBureauAlt;
        $this->listRefAlt = $listRefAlt;
        $this->listTuteur = $listTuteur;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('tel','number',array(
                'label' => false
            ))

            ->add('mail','email',array(
                'label' => false
            ))

            ->add('mailLille1','email',array(
                'label' => false
            ))

            ->add('tuteur','choice',array(
                'label' => false,
                'choices' => $this->listTuteur,
            ))

            ->add('entreprise','choice',array(
                'required' => false,
                'label' => false,
                'choices' => $this->listEntr,
            ))

            ->add('bureau','choice',array(
                'required' => false,
                'label' => false,
                'choices' => $this->listBureau
            ))

            ->add('referent','choice',array(
                'required' => false,
                'label' => false,
                'choices' => $this->listRef
            ))

            ->add('referent1','choice',array(
                'required' => false,
                'label' => false,
                'choices' => $this->listRef
            ))


            ->add('datecontrat','date',array(
                'required' => false,
                'label' => false
            ))

            ->add('dateDebutcontrat','date',array(
                'required' => false,
                'label' => false
            ))

            ->add('dateFincontrat','date',array(
                'required' => false,
                'label' => false
            ))

            ->add('entrepriseAlt','choice',array(
                'required' => false,
                'label' => false,
                'choices' => $this->listEntr
            ))

            ->add('bureauAlt','choice',array(
                'required' => false,
                'label' => false,
                'choices' => $this->listBureauAlt

            ))

            ->add('referentAlt','choice',array(
                'required' => false,
                'label' => false,
                'choices' => $this->listRefAlt
            ))

            ->add('referent1Alt','choice',array(
                'required' => false,
                'label' => false,
                'choices' => $this->listRefAlt
            ))
        ;

        $builder->addEventSubscriber(new FormStageSubscriber());

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
