<?php
/**
 * Created by PhpStorm.
 * User: Kashma
 * Date: 21/11/14
 * Time: 11:38
 */

namespace LEA\EtuBundle\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class FormStageSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(FormEvents::PRE_BIND => 'preBindData');
    }

    public function preBindData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        $form->add('bureau','text',array(
                'required' => false,
                'label' => 'Bureau ',
            ))

            ->add('referent','text',array(
                'required' => false,
                'label' => 'Référent 1  ',
            ))

            ->add('referent1','text',array(
                'required' => false,
                'label' => 'Référent 2 ',
            ))
            ->add('bureauAlt','text',array(
                'required' => false,
                'label' => 'Bureau ',
            ))

            ->add('referentAlt','text',array(
                'required' => false,
                'label' => 'Référent 1  ',
            ))

            ->add('referent1Alt','text',array(
                'required' => false,
                'label' => 'Référent 1  ',
            ))
        ;

    }
}

?>