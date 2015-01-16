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

        $form->add('transportAller','choice',array(
                    'label' => 'Transport utilisé',
                    'data' => $data["transportAller"]
            ))
            ->add('transportAllerEscale','choice',array(
                'label' => 'Transport utilisé en deuxième',
                'data' => $data["transportAllerEscale"]
            ))
            ->add('transportRetour','choice',array(
                'label' => 'Transport utilisé',
                'data' => $data["transportRetour"]
            ))
            ->add('transportRetourEscale','choice',array(
                'label' => 'Transport utilisé en deuxième',
                'data' => $data["transportRetourEscale"]
            ))
        ;
    }
}

?>