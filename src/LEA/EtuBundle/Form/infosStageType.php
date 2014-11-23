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

    public function __construct($infos,$listEntr,$listBureau,$listRef,$listBureauAlt,$listRefAlt)
    {
        $this->infos = $infos;
        $this->listEntr = $listEntr;
        $this->listBureau = $listBureau;
        $this->listRef = $listRef;
        $this->listBureauAlt = $listBureauAlt;
        $this->listRefAlt = $listRefAlt;

    }

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
                'label' => 'E-mail :'
            ))

            ->add('mailLille1','email',array(
                'label' => 'E-mail lille :'
            ))

            ->add('tuteur','text',array(
                'label' => 'Tuteur  :',
                'read_only' => true
            ))

            ->add('entreprise','choice',array(
                'required' => false,
                'label' => ' L\'entreprise ',
                'choices' => $this->listEntr,
                //'attr' => array('class' => 'select'),
            ))

            ->add('bureau','choice',array(
                'required' => false,
                'label' => 'Bureau ',
                'choices' => $this->listBureau
            ))

            ->add('referent','choice',array(
                'required' => false,
                'label' => 'Référent 1  ',
                'choices' => $this->listRef
            ))

            ->add('referent1','choice',array(
                'required' => false,
                'label' => 'Référent 2 ',
                'choices' => $this->listRef
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
                'label' => 'REGIE : ',
                'choices' => $this->listEntr
            ))

            ->add('bureauAlt','choice',array(
                'required' => false,
                'label' => 'Bureau ',
                'choices' => $this->listBureauAlt

            ))

            ->add('referentAlt','choice',array(
                'required' => false,
                'label' => 'Référent 1  ',
                'choices' => $this->listRefAlt
            ))

            ->add('referent1Alt','choice',array(
                'required' => false,
                'label' => 'Référent 1  ',
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
