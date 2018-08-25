<?php

namespace App\Form;

use App\Entity\Eleve;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeEleve')
            ->add('noms')
            ->add('prenoms')
            ->add('dateNaissance')
            ->add('lieuNaissance')
            ->add('parent')
            ->add('professionParent')
            ->add('contactParent')
            ->add('sante')
            ->add('regionOrigine')
            ->add('codeClasse')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
        ]);
    }
}
