<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextareaType::class, [
                'label' => 'Votre Nom', 
                'attr' => ['class' => 'nameContact']
            ])
            ->add('mail', EmailType::class, [
                'label' => 'Votre Mail',
                'attr' => ['class' => 'mailContact'],
            ])
            ->add('subject', TextareaType::class, [
                'label' => 'Votre Sujet',
                'attr' => ['class' => 'subjectContact']
            ])
            ->add('text', TextareaType::class, [
                'label' => 'Message',
                'attr' => ['class' => 'textContact']
            ])
            ->add('Envoyer', SubmitType::class, [
                'attr' => ['class' => 'submitButton'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
