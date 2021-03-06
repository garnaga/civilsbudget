<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class ConfirmDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name', 'text', [
                'label' => 'Ім’я (обов’язкове поле)',
                'constraints' => new NotBlank(['message' => 'Поле не може бути пустим'])
            ])
            ->add('last_name', 'text', [
                'label' => 'Прізвище (обов’язкове поле)',
                'constraints' => new NotBlank(['message' => 'Поле не може бути пустим'])
            ])
            ->add('email', 'email', [
                'label' => 'Електронна адреса (обов’язкове поле)',
                'required' => true,
                'constraints' => [
                    new NotBlank(['message' => 'Поле не може бути пустим']),
                    new Email(['message' => 'Поле електронної адреси не коректне'])
                ],
            ])
            ->add('phone', 'text', [
                'label' => 'Телефон'
            ])
            ->add('isSubscribe', 'checkbox', [
                'required' => false,
                'data' => true,
                'label' => 'Хочу отримати результати голосування на електронну адресу',
            ])

            ->add('isDataPublic', 'checkbox', [
                'required' => true,
                'data' => false,
                'label' => 'Надаю згоду на використання моїх особистих персональних даних відповідно до Закону України «Про захист персональних даних» від 01.06.2010 р. №2297-VI',
            ])

            ->add('save', 'submit')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'confirm_data';
    }
}
