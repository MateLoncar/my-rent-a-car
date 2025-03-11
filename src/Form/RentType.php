<?php

namespace App\Form;

use App\Entity\Person;
use App\Entity\Rent;
use App\Entity\Vehicle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rent_time', null, [
                'widget' => 'single_text',
            ])
            ->add('return_time', null, [
                'widget' => 'single_text',
            ])
            ->add('start_mileage')
            ->add('end_mileage')
            ->add('notice')
            ->add('vehicle_id', EntityType::class, [
                'class' => Vehicle::class,
                'choice_label' => 'model',
                'choice_label' => function (Vehicle $vehicle) {
                    return $vehicle->getBrand() . ' ' . $vehicle->getModel();
                },
            ])
            ->add('person_id', EntityType::class, [
                'class' => Person::class,
                'choice_label' => function (Person $person) {
                    return $person->getName() . ' ' . $person->getLastName();
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rent::class,
        ]);
    }
}
