<?php
/**
 * Created by PhpStorm.
 * User: Kashma
 * Date: 21/11/14
 * Time: 11:38
 */

namespace LEA\ProfBundle\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class FormODMSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(FormEvents::PRE_BIND => 'preBindData');
    }

    public function preBindData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        $form->setData($data);
        $form->setData($data["transportAller"]);

        $form->remove('transportAller')->remove('transportAllerEscale')->remove('transportRetour')->remove('transportRetourEscale');

        $form->add('transportAller','text',array(
                    'label' => 'Transport utilisé',
                    'data' => $data["transportAller"],
                    'required' => false,
            ))
            ->add('transportAllerEscale','text',array(
                'label' => 'Transport utilisé en deuxième',
                'data' => $data["transportAllerEscale"],
                'required' => false,
            ))
            ->add('transportRetour','text',array(
                'label' => 'Transport utilisé',
                'data' => $data["transportRetour"],
                'required' => false,
            ))
            ->add('transportRetourEscale','text',array(
                'label' => 'Transport utilisé en deuxième',
                'data' => $data["transportRetourEscale"],
                'required' => false,
            ))
        ;

    }
}

?>