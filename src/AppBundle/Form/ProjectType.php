<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProjectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text')
            ->add('description', 'textarea', [
                //'class="form-control" rows="5"
                'attr' => ['class' => 'form-control',
                    'rows' => '10']
            ])
            ->add('source', 'email')
            ->add('charge', 'number')
            ->add('city', 'text')
        ;
        if (in_array('admin', $options) && $options['admin']) {
            $builder
                ->add('lastDateOfVotes', 'date', [
                    'label' => 'Кінцева дата голосування'
                ])
                ->add('approved', 'choice', [
                'choices' => [
                    'Оприлюднити' => true,
                    'Блокувати' => false
                ],
                'choices_as_values' => true,
            ]);
        }
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'admin' => false,
            'data_class' => 'AppBundle\Entity\Project',
            'csrf_protection' => false
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'project';
    }
}
