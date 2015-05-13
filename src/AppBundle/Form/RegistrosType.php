<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use AppBundle\Form\Listener\AddCategoriasFieldSubscriber;

class RegistrosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha', 'date', array(
              'placeholder' => array('year' => 'Año', 'month' => 'Mes', 'day' => 'Día'),
            ))
            ->add('tiposRegistro', 'entity', array(
              'class'       => 'AppBundle:TiposRegistro',
              'property'    => 'tipoRegistro',
              'empty_value' => 'Seleccione'
            ))
            ->add('categorias', 'entity', array(
              'class'       => 'AppBundle:Categorias',
              'property'    => 'categoria',
              'empty_value' => 'Seleccione'
            ))
            ->add('descripcion')
            ->add('valor')
            ->add('monedas', 'entity', array(
              'class'       => 'AppBundle:Monedas',
              'property'    => 'moneda',
              'empty_value' => 'Seleccione'
            ))
        ;

        // Añadimos un EventListener que actualizará el campo state
        // para que sus opciones correspondan
        // con el pais seleccionado por el usuario
        $builder->addEventSubscriber(new AddCategoriasFieldSubscriber());
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Registros'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'registros';
    }
}
