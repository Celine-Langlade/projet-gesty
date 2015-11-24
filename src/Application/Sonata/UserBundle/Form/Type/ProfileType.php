<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace Application\Sonata\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sonata\UserBundle\Model\UserInterface;

class ProfileType extends \Sonata\UserBundle\Form\Type\ProfileType
{

    /**
     * @param string $class The User class name
     */
    public function __construct()
    {
       parent::__construct('Application\Sonata\UserBundle\Entity\User');
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', 'sonata_user_gender', array(
                'label'    => 'form.label_gender',
                'required' => true,
                'translation_domain' => 'SonataUserBundle',
                'choices' => array(
                    UserInterface::GENDER_FEMALE => 'gender_female',
                    UserInterface::GENDER_MALE   => 'gender_male',
                )
            ))
            ->add('firstname', null, array(
                'label'    => 'form.label_firstname',
                'required' => false
            ))
            ->add('lastname', null, array(
                'label'    => 'form.label_lastname',
                'required' => false
            ))
            ->add('adresse', 'text')
            ->add('codePostal', 'text')
            ->add('commune', 'text')
            ->add('phone', 'text')
            ->add('telephoneSecondaire', 'text')
            ->add('caf', 'text')
            ->add('modeDePaiement', 'choice',array(
                'choices'   => array('0' => 'Chèque', '1' => 'Especes', '2' => 'Prélèvements')))
            ->add('numeroIban', 'text')
            ->add('mandatActif', 'checkbox')
            ->add('file', 'file', array('label' => 'Company logo', 'required' => false))
            ->add('envoyer', 'submit')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'application_sonata_user_profile';
    }
}
