<?php

namespace App\Form;

use App\Constant\VehicleTypeConstants;
use App\Entity\Vehicle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brand')
            ->add('model')
            ->add('type', ChoiceType::class, array(
                'choices' => array_flip(VehicleTypeConstants::getConstants()),
            ))            
            ->add('year_of_production')
            ->add('mileage')
            ->add('no_of_seats')
            ->add('no_of_door')
            ->add('active')
            ->add('rented')
            ->add('notice')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicle::class,
        ]);
    }
}


