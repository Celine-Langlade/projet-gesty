<?php
namespace WCS\CantineBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use WCS\CantineBundle\Entity\DivisionRepository;
use WCS\CantineBundle\Entity\VoyageRepository;

use Scheduler\Component\DateContainer\DateNow;


class InscriptionVoyageAdmin extends Admin
{

    protected $baseRouteName = 'voyage_inscription';
    protected $baseRoutePattern = 'voyage_inscription';

    public function createQuery($context = 'list')
    {
        $queryBuilder = $this->getModelManager()->getEntityManager($this->getClass())->createQueryBuilder();
        $queryBuilder->select('e')
            ->from($this->getClass(), 'e')
            ->join('e.division', 'd')
            ->join('d.school', 's')
            ->where('s.active_voyage = TRUE')
            ->orderby('d.grade')
            ->addOrderBy('e.nom')
            ->addOrderBy('e.prenom')
        ;

        $proxyQuery = new ProxyQuery($queryBuilder);
        return $proxyQuery;

    }
    
    public function __construct($code, $class, $baseControllerName)
    {
        parent::__construct($code, $class, $baseControllerName);
    }

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $txt = $this->toString($this->getSubject());
        $formMapper
            ->with($txt)
                ->add('voyages'
                    , 'entity',
                    array(
                        'class'   => 'WCSCantineBundle:Voyage',
                        'query_builder' => function(VoyageRepository $er)
                        {
                            return $er->getQueryByEnabledAndDivisions(
                                array('division'=>$this->getSubject()->getDivision())
                                );
                        },
                        'multiple' => true,
                        'label' => 'Sélectionner le ou les voyages'
                    ))
            ->end()
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nom')
            ->add('prenom')
            ->add('division', null, array('label' => 'Classe'),

                'entity',
                array(
                    'class'   => 'WCSCantineBundle:Division',
                    'query_builder' => function(DivisionRepository $er)
                    {
                        return $er->getQueryVoyagesAutorises();
                    }
                ),
                array('admin_code'=>'sonata.admin.eleve')
            )
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('voyages', null, array('label'=>'Voyages', 'template' => 'ApplicationSonataUserBundle:CRUD:list_orm_many_to_many.html.twig'))
            ->add('nom', 'text')
            ->add('prenom', 'text')
            ->add('division', 'text', array('label'=>'Classe'))
            ->add('_action', 'actions',
                array('actions' => array(
                    'inscrirevoyage' => array(
                        'template' => 'ApplicationSonataUserBundle:Voyage:list__action_inscrirevoyage.html.twig'
                    ),
                    'delete' => array(),
                )))
        ;

    }


    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clearExcept(array('edit', 'list'));
    }

    public function toString($object)
    {
        return sprintf("%s - inscription à un/des voyages", $object->__toString());
    }
}
