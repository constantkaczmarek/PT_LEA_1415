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
use LEA\EtuBundle\Dbmngt\queriesEtapes;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface;
use LEA\EtuBundle\Dbmngt\DbUtils;

class infosStageType extends AbstractType
{


    private $infos;
    private $listEntr;
    private $listBureau;
    private $listRef;

    public function __construct($infos,$listEntr,$listBureau,$listRef)
    {
        $this->infos = $infos;
        $this->listEntr = $listEntr;
        $this->listBureau = $listBureau;
        $this->listRef = $listRef;

    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $dbUtils = new DbUtils();
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
                'choices' => $dbUtils->convertArrayToChoices($this->listEntr, "__sans entreprise__","SANS ENTREPRISE"),
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
                'choices' => $this->listBureau

            ))

            ->add('referentAlt','choice',array(
                'required' => false,
                'label' => 'Référent 1  ',
                'choices' => $this->listRef
            ))

            ->add('referent1Alt','choice',array(
                'required' => false,
                'label' => 'Référent 2 ',
                'choices' => $this->listRef
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
