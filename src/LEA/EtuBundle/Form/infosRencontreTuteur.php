<?php

namespace LEA\EtuBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class infosRencontreTuteur extends AbstractType
{

    private $valid;
    private $infos;

    public function __construct($valid,$infos)
    {
        $this->valid = $valid;
        $this->infos = $infos;

    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('valid','checkbox',array(
                'required' => false,
                'label' => 'Validation de létudiant',
            ))
            ->add('infos','textarea',array(
                'required' => false,
                'label' => 'Remarques éventuelles:',
            ));

    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'infosRencontreTuteurForm';
    }
}
