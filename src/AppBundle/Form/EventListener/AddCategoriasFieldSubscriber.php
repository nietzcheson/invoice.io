<?php

namespace AppBundle\Form\EventListener;

use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;

class AddCategoriasFieldSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SUBMIT => 'preSubmit',
        );
    }

    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();

        $this->addField($event->getForm(), $data['tiposRegistro']);
    }

    protected function addField(Form $form, $tipo)
    {
        $form->add('categorias', 'entity', array(
          'class' => 'AppBundle:Categorias',
          'property'    => 'categoria',
          'query_builder' => function(EntityRepository $er) use ($tipo){
            return $er->createQueryBuilder('c')
              ->where('c.tiposRegistro = :tipo')
              ->setParameter('tipo', $tipo);
          },
          'empty_value' => 'Seleccione'
        ));
    }
}
?>
