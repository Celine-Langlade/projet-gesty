<?php
/**
 * Created by PhpStorm.
 * User: Mikou
 * Date: 09/12/2015
 * Time: 09:57
 */

namespace WCS\CantineBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Request;

class EleveRepository extends EntityRepository
{
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
        $day = date('Y-m-d', strtotime('last monday', strtotime('tomorrow'))); //by default strtotime('last monday') returns the current day on mondays
        $result = [];
        for ($i=1;$i<=4;$i++)
        {
            /*$res = $this->getEntityManager()
                ->createQuery(
                    'SELECT COUNT(d) FROM WCSCantineBundle:Lunch d WHERE d.date LIKE :day'
                )
                ->setParameter(':day', "%".$day."%")
                ->getResult();
            array_push($result, $res[0][1]);
            if ($i===2) $day = date('Y-m-d', strtotime($day.' + 2 DAY')); // Jump Wednesday off
            else $day = date('Y-m-d', strtotime($day.' + 1 DAY'));*/
        }

        return $result;
    }

    public function getNumberMonthMeals($eleve_id)
    {
        $dateNow = new \Datetime();
        $dateNowFormat = date_format($dateNow, ('Y-m'));

        $dates = $this->getEntityManager()
            ->createQuery(
                'SELECT e FROM WCSCantineBundle:Lunch e WHERE e. LIKE :eleve'
            )
            ->setParameter(':eleve', "%".$eleve_id."%")
            ->getResult();

        $count = '';
        foreach ($dates as $date){
            if (preg_match('#^'.$dateNowFormat.'#', $date) === 1) {
                $count = count($date);
            }
        }
        return $count;

    }

}