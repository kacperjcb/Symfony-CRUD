<?php

namespace App\Form;

use App\Entity\DaneKlienta;
use App\Entity\CrudRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class DaneKlientaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Imie')
            ->add('Nazwisko')
            ->add('Miasto')
            ->add('KodPocztowy')
            ->add('Adres')
            ->add('NumerZamowienia', HiddenType::class,[    
                ]);


    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DaneKlienta::class,
        ]);

    }
}
