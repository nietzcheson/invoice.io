<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use AppBundle\Form\EventListener\AddCategoriasFieldSubscriber;

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
              'empty_value' => 'Seleccione',
              'label'       => 'Registro'
            ))
            ->add('categorias', 'entity', array(
              'class'       => 'AppBundle:Categorias',
              'property'    => 'categoria',
              'empty_value' => 'Seleccione el Registro',
              'attr' => array(
                'disabled' => true
              ),
              'label' => 'Categoría'
            ))
            ->add('valor')
            ->add('descripcion','textarea')
        ;

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
