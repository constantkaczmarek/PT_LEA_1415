<?php

namespace LEA\ProfBundle\Form;

use LEA\ProfBundle\EventListener\FormODMSubscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ODMType extends AbstractType
{

    private $transports;

    public function __construct()
    {
        //$this->transports = $transports;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('transportTrain','checkbox',array(
                'label' => 'Train',
                'required'=>false,
            ))
            ->add('classe','choice',array(
                'label' => 'Classe',
                'expanded'=> true,
                'multiple' => false,
                'choices' => array(
                    'premiere' => '1ère',
                    'seconde' => '2ème'
                )
            ))
            ->add('reduction','text',array(
                'label' => false
            ))
            ->add('moyenReductionTrain','text',array(
                'label' => false
            ))
            ->add('transportVoiture','checkbox',array(
                'label' => 'Voiture',
                'required'=>false,
            ))
            ->add('CV','number',array(
                'label' => false
            ))
            ->add('immatriculation','number',array(
                'label' => false
            ))
            ->add('transportVoitureLocation','checkbox',array(
                'label' => 'Location de voiture par Agence de voyages sur marché',
                'required'=>false,
            ))
            ->add('nbPersVoitureLocation','number',array(
                'label' => false
            ))
            ->add('transportAvion','checkbox',array(
                'label' => 'Avion',
                'required'=>false,
            ))
            ->add('transportTaxi','checkbox',array(
                'label' => 'Taxi',
                'required'=>false,
            ))
            ->add('transportMetro','checkbox',array(
                'label' => 'Transports en commun',
                'required'=>false,
            ))
            ->add('transportVelo','checkbox',array(
                'label' => 'Vélo',
                'required'=>false,
            ))
            ->add('departDifferent','checkbox',array(
                'label' => 'Départ différent',
                'required'=>false,
            ))
            ->add('departAller','text',array(
                'label' => 'Départ différent de Lille1',
                'required'=>false,
            ))



            ->add('dateAller','date',array(
                'label' => 'Date (Aller)*: '
            ))
            ->add('horaireDepartAller','text',array(
                'label' => 'Heure de départ (hh:mm)*: '
            ))
            ->add('horaireArriverAller','text',array(
                'label' => 'Heure de départ (hh:mm)*: '
            ))
            ->add('transportAller','choice',array(
                'label' => 'Transport utilisé',

            ))
            ->add('escaleAller','checkbox',array(
                'label' => 'Vous changez de moyen de transport pendant le voyage',
            ))
            ->add('villeEscaleAller','text',array(
                'label' => 'Ville de l\'escale *: '
            ))
            ->add('transportAllerEscale','choice',array(
                'label' => 'Transport utilisé en deuxième',
                'required'=>false,

            ))
            ->add('horaireDepartAllerEscale','text',array(
                'label' => 'Heure de départ en deuxième (hh:mm)*: '
            ))
            ->add('horaireArriverAllerEscale','text',array(
                'label' => 'Heure de départ en deuxième (hh:mm)*: '
            ))


            ->add('dateRetourDifferente','checkbox',array(
                'label' => 'Date de retour différent',
            ))
            ->add('dateRetour','date',array(
                'label' => 'Date (Retour)*: '
            ))
            ->add('horaireDepartRetour','text',array(
                'label' => 'Heure de départ (hh:mm)*: '
            ))
            ->add('horaireArriverRetour','text',array(
                'label' => 'Heure de départ (hh:mm)*: '
            ))
            ->add('transportRetour','choice',array(
                'label' => 'Transport utilisé',
                'choices' => array()
            ))
            ->add('escaleRetour','checkbox',array(
                'label' => 'Vous changez de moyen de transport pendant le voyage',
            ))
            ->add('villeEscaleRetour','text',array(
                'label' => 'Ville de l\'escale *: '
            ))
            ->add('transportRetourEscale','choice',array(
                'label' => 'Transport utilisé en deuxième',
                'required' => false,
            ))
            ->add('horaireDepartRetourEscale','text',array(
                'label' => 'Heure de départ en deuxième (hh:mm)*: '
            ))
            ->add('horaireArriverRetourEscale','text',array(
                'label' => 'Heure de départ en deuxième (hh:mm)*: '
            ))
            ->add('observations','text',array(
                'label' => 'Observations'
            ))
        ;

        $builder->addEventSubscriber(new FormODMSubscriber());
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LEA\ProfBundle\Entity\ODM'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ODMType';
    }

}
