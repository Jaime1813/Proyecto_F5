<?php

namespace App\Form;

use App\Entity\Puesto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use App\Entity\Personaje;
use App\Entity\Localizacion;


class PuestoType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Puesto::class,
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numero', IntegerType::class)
            ->add('localizacion', EntityType::class, [
                'class' => Localizacion::class,
                'choice_label' => 'nombre',
            ])
            ->add('ocupacion', ChoiceType::class, [
                'choices' => [
                    'WLF' => 'WLF',
                    'Serafitas' => 'Serafitas',
                    'Nido de infectados' => 'Nido de infectados',
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('observacion', TextareaType::class, ['required' => false]);

        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
            $data = $event->getData();
            $form = $event->getForm();
            $ocupacion = $data['ocupacion'] ?? [];

            if (in_array('WLF', $ocupacion)) {
                $form->add('personaje', EntityType::class, [
                    'class' => Personaje::class,
                    'choice_label' => 'nombre',
                    'required' => true,
                ]);
            }

            if (in_array('Serafitas', $ocupacion)) {
                $form->add('armas', CollectionType::class, [
                    'entry_type' => ChoiceType::class,
                    'entry_options' => [
                        'choices' => [
                            'Arco' => 'arco',
                            'Machete' => 'machete',
                            'Pistola' => 'pistola',
                        ],
                    ],
                    'allow_add' => true,
                    'allow_delete' => true,
                    'required' => true,
                ]);
            }

            if (in_array('Nido de infectados', $ocupacion)) {
                $form->add('tipoZombie', CollectionType::class, [
                    'entry_type' => ChoiceType::class,
                    'entry_options' => [
                        'choices' => [
                            'Clicker' => 'clicker',
                            'Runner' => 'runner',
                            'Stalker' => 'stalker',
                            'Bloater' => 'bloater',
                            'Rat King' => 'rat king',
                        ],
                    ],
                    'allow_add' => true,
                    'allow_delete' => true,
                    'required' => true,
                ]);
            }
        });
    }

}
