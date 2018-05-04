<?php

namespace Insat\Gl2Bundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClubType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom',TextType::class)
                ->add('president',EntityType::class,array(
                    'class'=>'Insat\Gl2Bundle\Entity\Personne',
                    'choice_label'=> 'nom',
                    'expanded'=> false,
                    'multiple'=> false,
                ))
                ->add('typeClub',EntityType::class,array(
                    'class'=>'Insat\Gl2Bundle\Entity\TypeClub',
                    'choice_label'=> 'designation',
                    'expanded'=> false,
                    'multiple'=> false,
                ))
                ->add('events',EntityType::class,array(
                    'class'=>'Insat\Gl2Bundle\Entity\Event',
                    'choice_label'=> 'designation',
                    'expanded'=> true,
                    'multiple'=> true,
                ))
            ->add('valider',SubmitType::class,array(
                'attr'=>array(
                    'class'=>'btn btn-primary'
                )
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Insat\Gl2Bundle\Entity\Club'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'insat_gl2bundle_club';
    }


}
