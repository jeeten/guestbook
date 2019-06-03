<?php

namespace App\Form;

use App\Entity\Guest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class GuestType extends AbstractType
{
    private $security;

    /**
     * __construct
     *
     * @param  mixed $security
     *
     * @return void
     */
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
     * buildForm
     *
     * @param  mixed $builder
     * @param  mixed $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $user = $this->security->getUser();
        if(isset($user) && $user->hasRole('ROLE_ADMIN')){
            $builder
            ->add('status', ChoiceType::class, array(
                'choices' => array(
                    'Main Statuses' => array(
                        'Approve' => 1,
                        'Pending' => 0,
                    ),
                ),
                
                ));
        }   

        // $builder
        //     ->add('description')
        //     ->add('image',FileType::class, ['label' => 'Browse (JPEG file)','required'    => false]);
        $builder
            ->add('description')
            ->add('image')   
            ->add('defimage', FileType::class, array(
                'label' => 'Browse (JPEG file)',
                'data_class' => null,
                'required'    => false,
            ));
    }

    /**
     * configureOptions
     *
     * @param  mixed $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Guest::class,
        ]);
    }
}
