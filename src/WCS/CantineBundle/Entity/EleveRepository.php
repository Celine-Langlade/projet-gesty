<?php
/**
 * Created by PhpStorm.
 * User: Mikou
 * Date: 09/12/2015
 * Time: 09:57
 */

namespace WCS\CantineBundle\Entity;

use Doctrine\ORM\EntityRepository;

class EleveRepository extends EntityRepository
{
    public function getTodayList($school)
    {
        // Format the date
        $date = new \DateTime();
        $day = $date->format('Y-m-d');

        // Request pupils to the database from a certain date
        // lien : http://symfony.com/doc/current/book/doctrine.html (src/AppBundle/Entity/ProductRepository.php)
        return $this->getEntityManager()
            ->createQuery(
                'SELECT e FROM WCSCantineBundle:Eleve e JOIN e.division d WHERE e.dates LIKE :day AND d.school = :place ORDER BY e.nom'
            )
            ->setParameter(':day', "%".$day."%")
            ->setParameter(':place', $school)
            ->getResult();
    }

    public function findByDate($children)
    {
        // Request pupils to the database from a certain date
        // lien : http://symfony.com/doc/current/book/doctrine.html (src/AppBundle/Entity/ProductRepository.php)
        return $this->getEntityManager()
            ->createQuery(
                'SELECT e FROM WCSCantineBundle:Eleve e WHERE e. LIKE :eleve AND e.'
            )
            ->setParameter(':eleve', "%".$children."%")
            ->getResult();
    }

    public function getCurrentWeekMeals()
    {
        $day = date('Y-m-d', strtotime('last monday'));
        $result = [];
        for ($i=1;$i<=4;$i++)
        {
            $res = $this->getEntityManager()
                ->createQuery(
                    'SELECT COUNT(e) FROM WCSCantineBundle:Eleve e WHERE e.dates LIKE :day'
                )
                ->setParameter(':day', "%".$day."%")
                ->getResult();
            array_push($result, $res[0][1]);
            if ($i===2) $day = date('Y-m-d', strtotime($day.' + 2 DAY')); // Jump Wednesday off
            else $day = date('Y-m-d', strtotime($day.' + 1 DAY'));
        }

        return $result;
    }
    public function mealsByMonth($children)
    {
        //Request meals by months by pupils
        return $this->getEntityManager()
            ->createQuery(

                  )
            ->setParameter(':eleve',"%".$children."%")
            ->getResult();



    }
}