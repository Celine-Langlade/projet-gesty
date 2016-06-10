<?php
//WCS/CantineBundle/Admin/InscriptionAdmin.php
namespace WCS\CantineBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class InscriptionAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('user',null,array('label'=>'Email des parents'))
            ->add('nom','text')
            ->add('prenom', 'text')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nom')
            ->add('prenom')
        ;
    }

    protected function configureShowFields(ShowMapper $datagridMapper)
    {
        $datagridMapper
            ->add('user',null,array('label'=>'Email des parents'))
            ->add('nom','text')
            ->add('prenom', 'text')
        ;

    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('nom', 'text')
            ->add('prenom', 'text')
            ->add('_action', 'actions', array('actions' => array(
                'edit' => array(),
                'delete' => array(),
            )))


        ;
    }
}
